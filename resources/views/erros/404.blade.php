@extends('layout.materPage')

@section('title', 'Página no encontrada')

@section('content')

<div class="flex items-center justify-center h-screen">
    <div class="text-center">
        <img src="{{asset('img/logo.png')}}" alt="" class="mx-auto w-32 mb-8">
        <h1 class="text-9xl font-bold text-blue-500">404</h1>
        <p class="text-2xl font-semibold">Página no encontrada</p>
        <p class="text-xl font-medium">La página que buscas no existe.</p>
        <div class="mt-10">
            <a href="{{route('login')}}" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 font-semibold rounded-md">
                Volver al inicio de sesión
            </a>
        </div>
    </div>
</div>

@endsection
