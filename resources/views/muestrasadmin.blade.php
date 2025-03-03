@extends('adminlte::page')
@vite(['resources/js/muestras.js'])
<meta content="{{ csrf_token() }}" name="csrf-token" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="shortcut icon" href="{{ asset('logoMedac.ico') }}" type="image/x-icon">

@section('content')
<div class="container d-flex flex-column min-vh-100">
    <div class="row justify-content-between align-items-center mt-5 pt-5 mb-4 g-3">
        <div class="col-md-3 col-6 order-1">
            <h1 class="text-sky-950 text-5xl font-bold mb-0">Muestras</h1>
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
                        placeholder="Buscar por código muestra..."
                    >
                </div>    
            </div>
        </div>
        
        <div class="col-md-3 col-6 order-2 order-md-3 text-end">
            <button 
                style="padding: 10px 18px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" 
                id="crear_muestra"
            >
            Crear muestra
            </button>
        </div>
    </div>

        <div class="col-12">
            <!--
            <div class="table-responsive bg-white shadow-md rounded-xl">
                
                <table class="table table-hover mb-0 text-center" style="min-width: 1000px;">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">ID</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Fecha de recolección</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Código muestra</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Organo</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Tipo</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Formato</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Calidad</p>
                            </th> 
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Usuario</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Sede</p>
                            </th> 
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Acciones</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="mostrar_muestras">
                        @foreach ($muestras as $m)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->id }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->fecha }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->codigo }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->organo }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p id="{{ $m->idTipo }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 tipo"></p>
                            </td> 
                             <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p id="{{ $m->idFormato }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 formato"></p>
                            </td> 
                            <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p id="{{ $m->idCalidad }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 calidad"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p id="{{ $m->idUsuario }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 usuario"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle" style="display: none">
                                <p id="{{ $m->idSede }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 sede"></p>
                            </td> 
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$m->id}}" data-toggle="dropdown" aria-expanded="false" style="background-color: #1E3A8A; color: white;">
                                            Acciones
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$m->id}}" >
                                            <li>
                                                <button style="padding: 10px 18px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="contenido">
                                                    Ver más
                                                </button>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: purple; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="modificar">
                                                    Modificar
                                                </button>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="imagenes" type="submit">
                                                    Añadir Imágenes
                                                </button>
                                            </li>
                                            <li>
                                                <form action="pdf/{{$m->id}}" style="display: contents;" method="POST">
                                                    @csrf
                                                    <button style="padding: 10px 18px; background-color: #4c9baf; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="imprimir" type="submit">
                                                        Imprimir PDF
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="eliminar">
                                                    Eliminar
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                -->
                <div class="row">
                    @foreach ($muestras as $muestra)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white bg-navy">
                                    <h5 class="card-title mb-0">Muestra #{{ $muestra->id }}</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Fecha de recolección:</strong> {{ $muestra->fecha }}</p>
                                    <p><strong>Código muestra:</strong> {{ $muestra->codigo }}</p>
                                </div>
                                <div class="card-footer text-end">
                                    <div class="btn-group" style="position: relative;">
                                        <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton{{$m->id}}" data-toggle="dropdown" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$m->id}}" style="position: absolute; z-index: 1051;">
                                            <li>
                                                <button style="padding: 10px 18px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="contenido">
                                                    Ver más
                                                </button>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: purple; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="modificar">
                                                    Modificar
                                                </button>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="imagenes" type="submit">
                                                    Añadir Imágenes
                                                </button>
                                            </li>
                                            <li>
                                                <form action="pdf/{{$m->id}}" style="display: contents;" method="POST">
                                                    @csrf
                                                    <button style="padding: 10px 18px; background-color: #4c9baf; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="imprimir" type="submit">
                                                        Imprimir PDF
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <button style="padding: 10px 18px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; text-align: center;" id="{{$m->id}}" class="eliminar">
                                                    Eliminar
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
                    {{ $muestras->links() }}
                </div>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_add" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700 font-medium mb-1">Fecha de recolección</label>
                    <input type="date" id="fecha" name="fecha" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="codigo" class="block text-gray-700 font-medium mb-1">Código muestra</label>
                    <input type="text" id="codigo" name="codigo" placeholder="Código" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="organo" class="block text-gray-700 font-medium mb-1">Órgano</label>
                    <select id="organo" name="organo" class="form-control">
                        <option value="BC">Corazón</option>
                        <option value="BB">Bazo</option>
                        <option value="BH">Hígado</option>
                        <option value="BF">Feto</option>
                        <option value="BES">Estómago</option>
                        <option value="BCB">Cerebro</option>
                        <option value="BR">Riñón</option>
                        <option value="BL">Lengua</option>
                        <option value="BU">Útero</option>
                        <option value="BO">Ovario</option>
                        <option value="BI">Intestino</option>
                        <option value="BTF">Trompa de Falopio</option>
                        <option value="BEF">Esófago</option>
                        <option value="BPA">Páncreas</option>
                        <option value="BT">Testículo</option>
                        <option value="BPI">Piel</option>
                        <option value="BP">Pulmón</option>
                    </select>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="idTipo">Tipo</label>
                        <select id="idTipo" class="form-control">
                            @foreach ($tipos as $ti)
                            <option id="{{$ti->id}}">{{$ti->nombre}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div>
                        <label for="idFormato">Formato</label>
                        <select id="idFormato" class="form-control">
                            @foreach ($formatos as $fo)
                            <option id="{{$fo->id}}">{{$fo->nombre}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div>
                        <label for="idCalidad">Calidad</label>
                        <select id="idCalidad" class="form-control">
                            @foreach ($calidades as $ca)
                            <option id="{{$ca->id}}">{{$ca->nombre}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div>
                        <label for="idUsuario">Usuario</label>
                        <select id="idUsuario" class="form-control">
                            @foreach ($usuarios as $us)
                            <option id="{{$us->id}}">{{$us->email}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    
                    <div>
                        <label for="idSede">Sede</label>
                        <select id="idSede" class="form-control">
                            @foreach ($sedes as $se)
                            <option id="{{$se->id}}">{{$se->nombre}}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="bg-gray-100 p-4 rounded shadow mt-4">
                    <h3>Interpretación</h3>
                    <div id="interpretaciones-container">
                        <div class="interpretacion-fields">
                            <div>
                                <label for="tipoEstudio">Tipo de Estudio</label>
                                <select id="idTipoEstudio" class="form-control">
                                    @foreach ($tipoEstudio as $ti)
                                    <option value="{{ $ti->id }}">{{ $ti->nombre }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div>
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-mas" id="add-interpretacion">
                        <i class="fas fa-plus"></i> Agregar más interpretaciones
                    </button>
                </div>
                <div>
            </form>
        </div>
        

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_update" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label for="fecha2" class="block text-gray-700 font-medium mb-1">Fecha de recolección</label>
                    <input type="date" id="fecha2" name="fecha" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="codigo2" class="block text-gray-700 font-medium mb-1">Código muestra</label>
                    <input type="text" id="codigo2" name="codigo" placeholder="Código" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="organo2" class="block text-gray-700 font-medium mb-1">Órgano</label>
                    <select id="organo2" name="organo2" class="form-control">
                        <option value="BC">Corazón</option>
                        <option value="BB">Bazo</option>
                        <option value="BH">Hígado</option>
                        <option value="BF">Feto</option>
                        <option value="BES">Estómago</option>
                        <option value="BCB">Cerebro</option>
                        <option value="BR">Riñón</option>
                        <option value="BL">Lengua</option>
                        <option value="BU">Útero</option>
                        <option value="BO">Ovario</option>
                        <option value="BI">Intestino</option>
                        <option value="BTF">Trompa de Falopio</option>
                        <option value="BEF">Esófago</option>
                        <option value="BPA">Páncreas</option>
                        <option value="BT">Testículo</option>
                        <option value="BPI">Piel</option>
                        <option value="BP">Pulmón</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="idTipo2">Tipo</label>
                        <select id="idTipo2" class="form-control">
                            @foreach ($tipos as $ti)
                            <option id="{{$ti->id}}">{{$ti->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    
                    <div>
                        <label for="idFormato2">Formato</label>
                        <select id="idFormato2" class="form-control">
                            @foreach ($formatos as $fo)
                            <option id="{{$fo->id}}">{{$fo->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    
                    <div>
                        <label for="idCalidad2">Calidad</label>
                        <select id="idCalidad2" class="form-control">
                            @foreach ($calidades as $ca)
                            <option id="{{$ca->id}}">{{$ca->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    
                    <div>
                        <label for="idUsuario2">Usuario</label>
                        <select id="idUsuario2" class="form-control">
                            @foreach ($usuarios as $us)
                            <option id="{{$us->id}}">{{$us->email}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    
                    <div>
                        <label for="idSede2">Sede</label>
                        <select id="idSede2" class="form-control">
                            @foreach ($sedes as $se)
                            <option id="{{$se->id}}">{{$se->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                </div>

                <div class="bg-gray-100 p-4 rounded shadow mt-4">
                    <h3>Interpretación</h3>
                    <div id="interpretaciones-container2">
                        <div class="interpretacion-fields2">
                            <div>
                                <label for="TipoEstudio2">Tipo de Estudio</label>
                                <select id="TipoEstudio2" class="w-full p-2 border rounded">
                                    @foreach ($tipoEstudio as $ti)
                                    <option id="{{ $ti->id }}">{{ $ti->nombre }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div>
                                <label for="descripcion2">Descripción</label>
                                <textarea name="descripcion2" id="descripcion2" cols="40" rows="5" class="w-full p-2 border rounded"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-primary btn-mas" id="add-interpretacion2">
                    <i class="fas fa-plus"></i> Agregar más interpretaciones
                </button>
                    <br>
                    <br>
                    <div id="imagenes-container"></div>
            </form>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_mostrar" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label for="fecha3" class="block text-gray-700 font-medium mb-1">Fecha de recolección</label>
                    <input type="date" id="fecha3" name="fecha" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="codigo3" class="block text-gray-700 font-medium mb-1">Código muestra</label>
                    <input type="text" id="codigo3" name="codigo" placeholder="Código" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="organo3" class="block text-gray-700 font-medium mb-1">Órgano</label>
                    <input type="text" id="organo3" name="organo3" placeholder="organo" class="w-full p-2 border rounded">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="idTipo3">Tipo</label>
                        <input type="text" id="idTipo3" name="idTipo3" placeholder="idTipo" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="idFormato3">Formato</label>
                        <input type="text" id="idFormato3" name="idFormato3" placeholder="idFormato" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="idCalidad3">Calidad</label>
                        <input type="text" id="idCalidad3" name="idCalidad3" placeholder="idCalidad" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="idUsuario3">Usuario</label>
                        <input type="text" id="idUsuario3" name="idUsuario3" placeholder="idUsuario" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="idSede3">Sede</label>
                        <input type="text" id="idSede3" name="idSede3" placeholder="idSede" class="w-full p-2 border rounded">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-12 col-md-6 mt-4">
    <form id="modal_imagen" class="bg-white p-4 rounded shadow">
        <div class="mb-4">
            <label for="imagen"></label>
            <input type="file" name="imagen" id="imagen">
            <br>
            <br>

            <label for="zoom">Introduce el Zoom de la Imagen</label>
            <select name="zoom" id="zoom">
                <option id="4">x4</option>
                <option id="10">x10</option>
                <option id="40">x40</option>
                <option id="100">x100</option>
            </select>
            <br>
            <br>
            <div id="extraImages"></div>
            <br>
            <br>
            <button type="button" id="addImage" class="btn btn-primary">Añadir otra imagen</button>
            
        </div>
    </form>
</div>
    
@endsection

@section('footer')
    @include('includes.footer')
@endsection