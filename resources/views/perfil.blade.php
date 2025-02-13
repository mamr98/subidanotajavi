@extends('adminlte::page')
@vite(['resources/js/app.js'])
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="text-center display-4 font-weight-bold text-dark mb-5">Perfil de Usuario</h1>

            <div class="card shadow-lg border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="mb-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Email:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->email }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Contraseña:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->password }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Rol:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->rol }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Nombre de la Sede:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->sede->nombre }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Muestras Realizadas:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->muestras->count() }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Fecha de Registro:</label>
                            <p class="form-control-plaintext bg-light rounded py-2 px-3">{{-- {{ Auth::user()->created_at->format('d/m/Y H:i') }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted mb-2">Imagen de perfil:</label>
                            <div class="text-center mb-3">
                                <img class="img-fluid shadow-sm" width="100" height="100" src="miguel.png{{-- {{ Auth::user()->profile_image ?? '/images/default-avatar.png' }} --}}" alt="Profile Image">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="profile_image">
                                <label class="custom-file-label" for="customFile">Cambiar imagen</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{-- {{ route('perfil.edit') }} --}}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow">
                            <i class="fas fa-edit mr-2"></i> Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

