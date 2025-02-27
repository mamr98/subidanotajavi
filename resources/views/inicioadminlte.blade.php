@extends('adminlte::page')

@section('content')
    <header
        class="position-relative bg-cover bg-center text-white text-center d-flex flex-column justify-content-center align-items-center p-3"
        style="background-image: url('{{ asset('portadaadmin.png') }}'); height: 50vh; min-height: 30vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(108, 117, 125, 0.6);"></div>
        <div class="position-relative z-index-1 w-100 text-center">
            <h2 class="display-4 font-weight-bold text-break text-md-nowrap text-sm-wrap fs-3 fs-md-1 mx-auto"
                style="max-width: 90%;">
                Genera y consulta informes
            </h2>
            <p class="mt-2 lead fs-6 fs-md-5 mx-auto" style="max-width: 80%;">Administra y visualiza todos tus informes en un
                solo lugar</p>
        </div>
    </header>

    <div class="container-fluid py-5">
        <div class="row g-3">
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{ route('administrador') }}">
                    <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-auto">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                            style="background: rgba(0, 0, 0, 0.2);">
                            <h3 class="card-title fs-5 fs-md-4 text-xl">Gestión Usuarios</h3>
                            <p class="card-text fs-6 fs-md-5">Gestiona los usuarios que hacen las muestras.</p>
                        </div>
                        <img src="{{ asset('usuarios.png') }}" class="card-img rounded-4 w-100"
                            style="height: 250px; object-fit: cover;" alt="Imagen 1">
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{ route('muestrasadmin') }}">
                    <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-auto">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                            style="background: rgba(0, 0, 0, 0.2);">
                            <h3 class="card-title fw-bold fs-5 fs-md-4 text-xl">Gestión Muestras</h3>
                            <p class="card-text fs-6 fs-md-5">Haz más fácil el seguimiento de tus muestras.</p>
                        </div>
                        <img src="{{ asset('muestras.png') }}" class="card-img rounded-4 w-100"
                            style="height: 250px; object-fit: cover;" alt="Imagen 2">
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{ route('perfil') }}">
                    <div class="card text-white border-0 position-relative rounded-4 overflow-hidden h-auto">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center"
                            style="background: rgba(0, 0, 0, 0.2);">
                            <h3 class="card-title fw-bold fs-5 fs-md-4 text-xl">Edita tu perfil</h3>
                            <p class="card-text fs-6 fs-md-5">Gestiona todos tus datos personales.</p>
                        </div>
                        <img src="{{ asset('perfil.png') }}" class="card-img rounded-4 w-100"
                            style="height: 250px; object-fit: cover;" alt="Imagen 3">
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@vite(['resources/css/app.css'])