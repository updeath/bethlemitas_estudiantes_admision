@extends('home.homePage')

@section('title', 'Pagina principal')

@section('content_dashboard')


<section class="flex items-center justify-center bg-center bg-no-repeat bg-[url('{{ asset('img/fondo_colegio.jpeg') }}')] bg-gray-600 bg-blend-multiply h-[80vh] overflow-hidden">
    <div class="text-center ">
        <h1 class="text-white font-bold text-2xl">
            <em>Bienvenidos al sistema de evaluación del colegio <span class="text-4xl text-[#3A8BC0]">Bethlemitas Pereira</span></em>
        </h1>
        <p id="typed-text" class=" text-gray-100 px-[120px] p-5"></p>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var typed = new Typed('#typed-text', {
            strings: [
                "Esta aplicación agiliza el proceso de evaluación, permitiendo a los educadores personalizar y llevar a cabo evaluaciones eficientes del rendimiento académico de los estudiantes"
            ],
            typeSpeed: 50,
            backSpeed: 15,
            backDelay: 2000,
            loop: true,
            
        });
    });
</script>

@endsection
