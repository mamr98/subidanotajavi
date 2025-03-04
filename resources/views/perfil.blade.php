@extends('adminlte::page')
@vite(['resources/js/imagenes.js','resources/css/app.css'])
<meta content="{{ csrf_token() }}" name="csrf-token" />
<link rel="shortcut icon" href="{{ asset('logoMedac.ico') }}" type="image/x-icon">

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class="text-center display-4 font-weight-bold text-dark mb-5">Perfil de Usuario</h1>
                <form action={{-- "{{route('imagenUsuario')}} --}} method="POST" enctype="multipart/form-data">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4 p-md-5">

                            <div class="form-group">
                                <label class="font-weight-bold text-muted mb-2">Email:</label>
                                <p class="form-control-plaintext bg-light rounded py-2 px-3">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-muted mb-2">Nombre de la Sede:</label>
                                <p class="form-control-plaintext bg-light rounded py-2 px-3">{{ Auth::user()->sede->nombre }}</p>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-muted mb-2">Imagen de perfil:</label>
                                <div class="text-center mb-3">
                                    <img id="profileImage" class="img-fluid shadow-sm d-block mx-auto" width="100" height="100"
                                        src="{{ Auth::user()->foto }}"
                                        alt="Profile Image" data-default-image="{{ asset('usuario_defecto.png') }}"
                                        data-upload-route="{{ route('upload') }}">

                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="imagen"
                                        accept="image/jpeg, image/png" onchange="handleImageUpload(this)">
                                    <label class="custom-file-label" for="customFile">Cambiar imagen</label>
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <a href="{{-- {{ route('perfil.edit') }} --}}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow"
                                    id="changeImageButton">
                                    <i class="fas fa-edit mr-2"></i> Editar Perfil
                                </a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
@endsection

@section('footer')
    @include('includes.footer')
@endsection

@vite(['resources/js/perfil.js'])
