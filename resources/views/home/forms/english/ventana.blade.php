
@extends('home.homePage')

@section('title', '  Richmond')


@section('content_dashboard')

<div class="flex flex-col items-center space-y-4">
    <img class="w-[700px] h-[300px] rounded" src="{{ asset('img/richmond_logotipo.jpg') }}">
    <button onclick="window.open('https://placementest.com/rpt/pages/login_student.php', '_blank')" class="bg-blue-500 text-white py-2 px-4 rounded">
        Ir a la prueba
    </button>
</div>

@endsection