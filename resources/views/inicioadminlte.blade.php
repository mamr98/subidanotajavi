@extends('adminlte::page')

@section('content')
<header class="position-relative bg-cover bg-center text-white text-center d-flex flex-column justify-content-center align-items-center p-3" 
    style="background-image: url('{{ asset('portada.png') }}'); height: 50vh; min-height: 30vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(108, 117, 125, 0.6);"></div>
    <div class="position-relative z-index-1 w-100 text-center">
        <h2 class="display-4 font-weight-bold text-break text-md-nowrap text-sm-wrap fs-3 fs-md-1 mx-auto" 
            style="max-width: 90%;">
            Genera y consulta informes
        </h2>
        <p class="mt-2 lead fs-6 fs-md-5 mx-auto" style="max-width: 80%;">Administra y visualiza todos tus informes en un solo lugar</p>
    </div>
</header>


<div class="container-fluid py-5">
    <div class="row g-3">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-100 hover:transform hover:-translate-y-2 transition duration-300">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title  fs-5 fs-md-4">Gestiona</h3>
                    <p class="card-text fs-6 fs-md-5">LLeva tus muestras siempre al dia.</p>
                </div>
                <img src="gestion.png" class="card-img rounded-4 w-100" 
                    style="height: 250px; object-fit: cover;" alt="Imagen 1">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-100 hover:transform hover:-translate-y-2 transition duration-300">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title fw-bold fs-5 fs-md-4">Control</h3>
                    <p class="card-text fs-6 fs-md-5">Haz más facil el seguimiento de tus muestras.</p>
                </div>
                <img src="seguimiento.png" class="card-img rounded-4 w-100" 
                    style="height: 250px; object-fit: cover;" alt="Imagen 2">
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-100 hover:transform hover:-translate-y-2 transition duration-300">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                    style="background: rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title fw-bold fs-5 fs-md-4">Seguridad</h3>
                    <p class="card-text fs-6 fs-md-5">Administración segura y eficiente de tus muestras.</p>
                </div>
                <img src="seguridad.png" class="card-img rounded-4 w-100" 
                    style="height: 250px; object-fit: cover;" alt="Imagen 3">
            </div>
        </div>
    </div>
</div>


@endsection
@vite(['resources/css/app.css'])
