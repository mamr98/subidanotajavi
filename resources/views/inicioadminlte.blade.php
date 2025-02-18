@extends('adminlte::page')

@section('content')
<header class="position-relative bg-cover bg-center text-white text-center p-5" style="background-image: url('{{ asset('portada.png') }}');height: 320px;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(108, 117, 125, 0.6);"></div>
    <div class="position-relative z-index-1">
        <h2 class="display-4 font-weight-bold">Genera y consulta informes</h2>
        <p class="mt-4 lead">Administra y visualiza todos tus informes en un solo lugar</p>
    </div>
</header>
<div class="container-fluid py-5">
    <div class="row g-4">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title fw-bold">Título 1</h3>
                    <p class="card-text">Descripción breve sobre este apartado.</p>
                </div>
                <img src="gestion.png" class="card-img rounded-4 h-64 object-cover w-100" alt="Imagen 1">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title fw-bold">Título 2</h3>
                    <p class="card-text">Información relevante de esta tarjeta.</p>
                </div>
                <img src="seguimiento.png" class="card-img rounded-4 h-64 object-cover w-100" alt="Imagen 2">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title fw-bold">Título 3</h3>
                    <p class="card-text">Otro dato importante de esta sección.</p>
                </div>
                <img src="seguridad.png" class="card-img rounded-4 h-64 object-cover w-100" alt="Imagen 3">
            </div>
        </div>
    </div>
</div>



@endsection
@vite(['resources/css/app.css'])