@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="shortcut icon" href="{{ asset('logoMedac.ico') }}" type="image/x-icon">

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <div class="row justify-content-between align-items-center mt-3 pt-3 mb-4 g-3">
        <div class="col-md-3 col-6 order-1">
            <h1 class="text-sky-950 text-5xl font-bold mb-0">Usuarios</h1>
        </div>
        
        <div class="col-md-6 col-12 order-3 order-md-2 mt-3 mt-md-0">
            <div class="mx-auto" style="max-width: 500px;">
                <div class="input-group input-group-lg rounded-pill shadow-sm">
                    <span class="input-group-text bg-transparent border-0 pe-0">
                        <i class="bi bi-search text-secondary"></i>
                    </span>
                    <input id="buscador" 
                        type="search"
                        class="form-control border-0 rounded-pill" 
                        placeholder="Buscar por email..."
                    >
                </div>    
            </div>
        </div>
        
        <div class="col-md-3 col-6 order-2 order-md-3 text-end">
            <button 
                style="padding: 10px 18px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" 
                id="crear_usuario"
            >
                Crear usuario
            </button>
        </div>
    </div>

        <div class="col-12">
            {{-- <div class="table-responsive bg-white rounded-xl">
                <table class="table table-hover mb-0 text-center" style="min-width: 1000px;">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">ID</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Email</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Contraseña</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Estado</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Sede</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Acciones</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="mostrar_usuario">
                        @foreach ($usuarios as $u)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->id }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->email }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->password }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                @if ($u->estado)
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Activado</p>                                    
                                @else
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Desactivado</p>
                                @endif
                               
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $u->idSede }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 sede"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <div class="flex justify-center items-center gap-2">
                                    <button style="padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="modificar">Modificar</button>
                                    <button style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="desactivar">Desactivar</button>
                                    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="activar">Activar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-end mx-5">
                    {{ $usuarios->links() }}
                </div>
            </div> --}}
            <div class="row" id="mostrar_usuario">
                @foreach ($usuarios as $u)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white bg-navy">
                                <h5 class="card-title mb-0">Usuario #{{ $u->id }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Email:</strong> {{ $u->email }}</p>
                                <p><strong>Estado:</strong> 
                                    @if ($u->estado)
                                        Activado
                                    @else
                                        Desactivado
                                    @endif
                                </p>
                                <p><strong>Sede:</strong> <span id="{{ $u->idSede }}" class="sede"></span></p>
                            </div>
                            <div class="card-footer text-end">
                                <div class="btn-group" style="position: relative;">
                                    <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton{{$u->id}}" data-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$u->id}}" style="position: absolute; z-index: 1051;">
                                        <li>
                                            <button style="padding: 10px 18px; background-color: #17A2B8; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$u->id}}" class="modificar">
                                                Modificar
                                            </button>
                                        </li>
                                        <li>
                                            <button style="padding: 10px 18px; background-color: #DC3545; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$u->id}}" class="desactivar">
                                                Desactivar
                                            </button>
                                        </li>
                                        <li>
                                            <button style="padding: 10px 18px; background-color: #28A745; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$u->id}}" class="activar">
                                                Activar
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 d-flex justify-content-end mx-5">
                {{ $usuarios->links() }}
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-4">
            <form id="modal" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-3">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="text" id="email" class="w-full p-2 border rounded">
                </div>

                <div class="mb-3">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                    <input type="text" id="password" class="w-full p-2 border rounded">
                </div>

                <div class="mb-3">
                    <label for="estado" class="block text-gray-700 font-medium mb-2">Estado</label>
                    <select id="estado" class="w-full p-2 border rounded">
                        <option value="1">Activo</option>
                        <option value="0">Pausado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idSede" class="block text-gray-700 font-medium mb-2">Sede</label>
                    <select id="idSede" class="w-full p-2 border rounded">
                        @foreach ($sedes as $se)
                        <option id="{{$se->id}}">{{$se->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-6 mt-4">
            <form id="modal_update" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-3">
                    <label for="email2" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="text" id="email2" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password2" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                    <input type="text" id="password2" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="estado2" class="block text-gray-700 font-medium mb-2">Estado</label>
                    <select id="estado2" class="form-control">
                        <option value="1">Activo</option>
                        <option value="0">Pausado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idSede2" class="block text-gray-700 font-medium mb-2">Sede</label>
                    <select id="idSede2" class="form-control">
                        @foreach ($sedes as $se)
                        <option id="{{$se->id}}">{{$se->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('includes.footer')
@endsection
@vite(['resources/js/app.js'])

