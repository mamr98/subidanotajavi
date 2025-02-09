@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
    
    <header id="header" class="text-white text-center py-5">
        <div class="container">
            <h1>Generar informe citodiagnóstico</h1>
            <p>Un lugar donde encuentras lo mejor</p>
        </div>
    </header>
    
    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <h3>Rápido</h3>
                <button>Ver muestras</button>
            </div>
            <div class="col-md-4 text-center">
                <h3>Seguro</h3>
                <button class="btn btn-primary">Crear muestra</button>
            </div>
            
        </div>
    </section>

@endsection
@vite([ 'resources/css/principal.css' ,'resources/js/app.js'])