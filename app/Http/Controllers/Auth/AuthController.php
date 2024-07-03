<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function authenticate(Request $request) {

        $request->validate([
            'number_documment' => 'required|integer',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only('number_documment', 'password'))) {
            $user = Auth::user();

            if ($user->status === 'Activo') {
                View::share('user', $user);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('info', 'El usuario no puede ingresar porque esta inactivo!');
            }
        }

        return back()->withErrors(['invalid_credentials' => 'Email y contraseña son incorrecta'])->withInput();

    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }

    public function StartPage(){
        return view('home.StartPage');
    }

    public function forgotpassword(Request $request) {
        return view('auth.verifyemail');
    }


    public function resetPassword($token) {
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function updatePassword(Request $request){


        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where(['email' => $request->email, 'token' => $request->token])
        ->first();

        if($updatePassword){
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();
            }

            DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

            return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente');
        } else {
            return back()->withInput()->with('error', 'Token no existe o ha expirado');
        }
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Verifica si el correo existe en la base de datos
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'La dirección de correo electrónico no existe en nuestra base de datos.');
        }

        // Busca una solicitud activa para el mismo correo electrónico
        $existingRequest = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('expires_at', '>', now())
            ->first();

        if ($existingRequest) {
            // Ya existe una solicitud activa para este correo y aún no ha caducado
            $remainingTime = now()->diffInMinutes($existingRequest->expires_at);
            return back()->with('error', 'Ya se ha enviado una solicitud de recuperación de contraseña recientemente para este correo. Por favor, espere al menos ' . $remainingTime . ' minutos antes de solicitar otra.');
        }

        // Elimina solicitudes anteriores para el mismo correo electrónico
        DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->delete();

        $expiration = Carbon::now()->addMinutes(10); // Caduca en 10 minutos

        $tokenValidar = Str::random(60);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $tokenValidar,
            'created_at' => Carbon::now(),
            'expires_at' => $expiration
        ]);

        $consultaToken = DB::table('password_reset_tokens')->where('email', $request->email)->value('token');

        Mail::send('auth.verify', ['token' => $consultaToken], function ($message) use ($request) {
            $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                ->to($request->email)
                ->subject('Restablecer contraseña en la plataforma bethlemitas');
        });

        return back()->with('message', 'Se ha enviado un correo para restablecer su contraseña. Este enlace caducará en 10 minutos.');
    }


}
