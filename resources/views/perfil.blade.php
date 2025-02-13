@extends('adminlte::page')
@vite(['resources/js/app.js'])
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="text-center text-8xl font-bold text-gray-800 mt-4 mb-6">Perfil de Usuario</h1>

            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="space-y-4 pb-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Email:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->email }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Contraseña:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->password }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Rol:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->rol }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Nombre de la Sede:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->sede->nombre }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Muestras Realizadas:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->muestras->count() }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Fecha de Registro:</label>
                            <p class="form-control bg-light">{{-- {{ Auth::user()->created_at->format('d/m/Y H:i') }} --}}</p>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-gray-700">Cambiar imagen de perfil:</label>
                            <div class="d-flex justify-content-center mb-3 mt-2"><img class="img-fluid" width="100" height="100" src="" alt=""></div>
                            <p class="d-flex justify-content-center"><input type="file" name="Añadir imagen" id="imagen"></p>
                            
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{-- {{ route('perfil.edit') }} --}}" class="btn btn-primary btn-lg">
                            <i class="fas fa-edit mr-2"></i> Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection