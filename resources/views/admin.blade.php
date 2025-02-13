@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-between align-items-center mt-5 mb-4">
            <h1 class="text-sky-950 text-5xl font-bold">Usuarios</h1>
            <button style="padding: 10px 18px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" id="crear_usuario">Crear usuario</button>
        </div>

        <div class="col-12">
            <div class="table-responsive bg-white rounded-xl">
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
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Rol</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Estado</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Id Sede</p>
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
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->rol }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->estado }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->idSede }}</p>
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
                <div class="mt-4">
                    {{ $usuarios->links() }}
                </div>
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
                    <label for="rol" class="block text-gray-700 font-medium mb-2">Rol</label>
                    <select id="rol" class="w-full p-2 border rounded">
                        <option value="usuario">Usuario</option>
                        <option value="administrador">Administrador</option>
                    </select>
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
                    <input type="text" id="email2" class="w-full p-2 border rounded">
                </div>

                <div class="mb-3">
                    <label for="password2" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                    <input type="text" id="password2" class="w-full p-2 border rounded">
                </div>

                <div class="mb-3">
                    <label for="rol2" class="block text-gray-700 font-medium mb-2">Rol</label>
                    <select id="rol2" class="w-full p-2 border rounded">
                        <option value="usuario">Usuario</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="estado2" class="block text-gray-700 font-medium mb-2">Estado</label>
                    <select id="estado2" class="w-full p-2 border rounded">
                        <option value="1">Activo</option>
                        <option value="0">Pausado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idSede2" class="block text-gray-700 font-medium mb-2">Sede</label>
                    <select id="idSede2" class="w-full p-2 border rounded">
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
@vite(['resources/js/app.js'])

