@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<div class=" container">
    <div class="row justify-content-center"> 

        <div class="col-12 d-flex justify-content-between align-items-center mt-5 mb-4">
            
            <h1 class="text-sky-950 text-5xl font-bold">Usuarios</h1>
            
            <button style="padding: 10px 18px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" id="crear_usuario">Crear usuario</button>
        </div>

        <div class="col-12 p-0"> 
            <div class="table-responsive bg-white shadow-md rounded-xl w-full"> 
                <table class="w-full text-center table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Email
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Contraseña
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Rol
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Estado
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Id Sede
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Acciones
                                </p>
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
                                <div class="d-flex justify-content-center gap-2">
                                    <button style="padding: 10px 20px; margin-right:5px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="modificar">Modificar</button>
                                    <button style="padding: 10px 20px; margin-right:5px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="desactivar">Desactivar</button>
                                    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="activar">Activar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal" class="bg-white p-4 rounded shadow">
                @csrf
                <label for="email">Email</label><br>
                <input type="text" id="email" class="w-full p-2 border rounded"><br>

                <label for="password">Contraseña</label><br>
                <input type="text" id="password" class="w-full p-2 border rounded"><br> 

                <label for="rol">Rol</label><br>
                <select id="rol" class="w-full p-2 border rounded">
                    <option value="usuario">Usuario</option>
                    <option value="administrador">Administrador</option>
                </select><br> 

                <label for="estado">Estado</label><br>
                <select id="estado" class="w-full p-2 border rounded">
                    <option value="1">Activo</option>
                    <option value="0">Pausado</option>
                </select><br> 

                <label for="idSede">Sede</label><br>
                <select id="idSede" class="w-full p-2 border rounded">
                    @foreach ($sedes as $se)
                    <option id="{{$se->id}}">{{$se->nombre}}</option>
                    @endforeach
                </select><br> 
            </form>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_update" class="bg-white p-4 rounded shadow">
                @csrf
                <label for="email">Email</label><br>
                <input type="text" id="email2" class="w-full p-2 border rounded"><br>

                <label for="password">Contraseña</label><br>
                <input type="text" id="password2" class="w-full p-2 border rounded"><br> 

                <label for="rol">Rol</label><br>
                <select id="rol2" class="w-full p-2 border rounded">
                    <option value="usuario">Usuario</option>
                    <option value="administrador">Administrador</option>
                </select><br> 

                <label for="estado2">Estado</label><br>
                <select id="estado2" class="w-full p-2 border rounded">
                    <option value="1">Activo</option>
                    <option value="0">Pausado</option>
                </select><br> 

                <label for="idSede">Sede</label><br>
                <select id="idSede2" class="w-full p-2 border rounded">
                    @foreach ($sedes as $se)
                    <option id="{{$se->id}}">{{$se->nombre}}</option>
                    @endforeach
                </select><br> 
            </form>
        </div>
    </div>
</div>

@endsection
@vite(['resources/js/app.js'])