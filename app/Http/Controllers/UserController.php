<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Exports\AspirantesExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function index_profile()
    {
        return view("home.user.profile");
    }

    public function index_create_user()
    {
        $roles = Role::all();
        return view('home.user.create', compact('roles'));
    }

    public function index_students(Request $request)
    {
        // Inicializar la consulta de usuarios con el rol "Aspirante"
        $query = User::whereHas('roles', function ($q) {
            $q->where('name', 'Aspirante');
        });

        // Si hay un término de búsqueda, aplicar la condición
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('degree', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });

            
    
        }
        

        // Obtener usuarios asociados al rol "Aspirante" con paginación
        $users = $query->paginate(10);

        // Crear un arreglo asociativo para almacenar los roles de cada usuario
        $userRoles = [];

        foreach ($users as $user) {
            $userRoles[$user->id] = $user->getRoleNames()->toArray();
        }

        // Obtener el rol "Aspirante" para pasarlo a la00 vista (puedes necesitar esto para otras partes de tu vista)
        $studentRole = Role::where('name', 'Aspirante')->first();

        return view('home.user.tableStudents', compact('users', 'studentRole', 'userRoles'));
    }



    public function index_listing_user(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        $users = $query->paginate(10);

        $userRoles = [];

        foreach ($users as $user) {
            $roles = $user->roles ? $user->roles->pluck('name') : collect();
            $userRoles[$user->id] = $roles->all(); 
        }

        return view('home.user.listing', compact('users', 'userRoles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'number_documment' => 'required|digits_between:1,20|unique:users',
            'typeDocumment' => 'required|in:TI,CC,NUIP',
            'iphone' => 'required|numeric',
            'status' => 'required|in:Activo,Bloqueado',
            'degree' => 'nullable|in:jardin,pre-jardin,transición,1°,2°,3°,4°,5°,6°,7°,8°,9°,10°',
            'asignature' => 'nullable|in:english,math,spanish,spanish/math,spanish/english,english/math',
            'load_degrees' => 'nullable|in:pre-jardin/jardin,1°,2°,3°-4°,5°-6°-7°,8°-9°,10°',
            'password' => 'required',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->number_documment = $request->input('number_documment');
        $user->typeDocumment = $request->input('typeDocumment');
        $user->iphone = $request->input('iphone');
        $user->status = $request->input('status');
        $user->degree = $request->input('degree');

        
        $roles = Role::whereIn('id', $request->input('roles'))->get();
        $user->assignRole($roles);

        $user->asignature = $request->input('asignature');
        $user->load_degrees = $request->input('load_degrees');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Usuario creado correctamente.');
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        $degree = $user->degree; 
        return view('home.user.update', compact('user', 'roles', 'userRoles' , 'degree'));
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $datosActuales = $user->toArray();
        $huboCambios = false;

        $validatedData = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'degree' => 'nullable|in:jardin,pre-jardin,transición,1°,2°,3°,4°,5°,6°,7°,8°,9°,10°',
            'asignature' => 'nullable|in:english,math,spanish,spanish/math,spanish/english,english/math',
            'load_degrees' => 'nullable|in:pre-jardin/jardin,1°,2°,3°-4°,5°-6°-7°,8°-9°,10°',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'number_documment' => 'required|digits_between:1,20|unique:users,number_documment,' . $user->id,
            'typeDocumment' => 'required|in:TI,CC,NUIP',
            'iphone' => 'required|numeric',
            'status' => 'required|in:Activo,Bloqueado',
            'password' => 'required|min:6',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ]);

        $fieldsToUpdate = [
            'name' => 'name',
            'last_name' => 'last_name',
            'degree' => 'degree',
            'asignature' => 'asignature',
            'load_degrees' => 'load_degrees',
            'email' => 'email',
            'number_documment' => 'number_documment',
            'typeDocumment' => 'typeDocumment',
            'iphone' => 'iphone',
            'status' => 'status',
        ];

        foreach ($fieldsToUpdate as $field => $attribute) {
            // Usa array_key_exists para verificar si la clave está presente
            if ($attribute != 'password' && array_key_exists($field, $validatedData) && $datosActuales[$attribute] != $validatedData[$field]) {
                $user->$attribute = $validatedData[$field];
                $huboCambios = true;
            } elseif ($attribute != 'password' && !array_key_exists($field, $validatedData) && $datosActuales[$attribute] !== null) {
                $user->$attribute = null;
                $huboCambios = true;
            }
        }

        if ($user->password != $validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
            $huboCambios = true;
        }

        $rolesActuales = $user->roles->pluck('id')->toArray();
        $rolesSeleccionados = $request->input('roles');

        if (count(array_diff($rolesActuales, $rolesSeleccionados)) > 0 || count(array_diff($rolesSeleccionados, $rolesActuales)) > 0) {
            $user->roles()->sync($rolesSeleccionados);
            $huboCambios = true;
        }

        if ($huboCambios) {
            $user->update();
            return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
        } else {
            return redirect()->back()->with('info', 'No se realizó ninguna actualización.');
        }
    }


    public function profile_update(Request $request)
    {
        $user = Auth::user(); // Obtiene los datos del usuario logueado

        // Validacion de los datos
        if (!Auth::user()->hasRole('Admin')) {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $user->id,
                'iphone' => 'required|numeric',
                'password' => 'required|min:6'
            ]);

            $user->email = $request->email;
            $user->iphone = $request->iphone;
            $user->password = $request->password;
        } else {
            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'number_documment' => 'required|digits_between:1,20|unique:users,number_documment,' . $user->id,
                'typeDocumment' => 'required|in:TI,CC,NUIP',
                'iphone' => 'required|numeric',
                'password' => 'required|min:6',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->number_documment = $request->number_documment;
            $user->typeDocumment = $request->typeDocumment;
            $user->iphone = $request->iphone;
            $user->password = $request->password;
        }

        // Validar la foto
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $filename = $user->id . '.' . $photo->getClientOriginalExtension();
            $destinationPath = 'img/photo';
            $photo->move(public_path($destinationPath), $filename);
            $user->image = $destinationPath . '/' . $filename;
        }

        // Si los datos son diferentes se actualiza
        if ($user->isDirty()) {
            $user->update();
            return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
        } else {
            return redirect()->back()->with('info', 'No se realizó ninguna actualización.');
        }
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            $photoPath = public_path($user->image);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $user->delete();

        return redirect()->back()->with('destroy_user', 'ok_user');
    }
    public function exportExcel()
    {
        $fileName = 'aspirantes.xlsx';
        Excel::store(new AspirantesExport, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelUsers()
    {
        $fileName = 'Users.xlsx';
        Excel::store(new UserExport, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
}
