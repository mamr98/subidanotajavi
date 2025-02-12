@extends('adminlte::page')
@vite(['resources/js/muestras.js'])
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-between align-items-center mb-4 mt-4">
            <h1 class="text-sky-950 text-5xl font-bold">Muestras</h1>
            <button style="padding: 10px 20px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" id="crear_muestra">Crear muestra</button>
        </div>

        <div class="col-12">
            <div class="table-responsive bg-white shadow-md rounded-xl">
                <table class="table table-hover mb-0 text-center" style="min-width: 1000px;">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Fecha de recolección</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Código muestra</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Organo</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Tipo</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Formato</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Calidad</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Usuario</p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50 align-middle">
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
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->fecha }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->codigo }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $m->organo }}</p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $m->idTipo }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 tipo"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $m->idFormato }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 formato"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $m->idCalidad }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 calidad"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $m->idUsuario }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 usuario"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50 align-middle">
                                <p id="{{ $m->idSede }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 sede"></p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button style="padding: 10px 18px; margin-right:3px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$m->id}}" class="modificar">Modificar</button>
                                    <button style="padding: 10px 18px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$m->id}}" class="eliminar">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_add" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700 font-medium mb-1">Fecha de recolección:</label>
                    <input type="date" id="fecha" name="fecha" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="codigo" class="block text-gray-700 font-medium mb-1">Código muestra:</label>
                    <input type="text" id="codigo" name="codigo" placeholder="Código" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="organo" class="block text-gray-700 font-medium mb-1">Órgano:</label>
                    <select id="organo" name="organo" class="w-full p-2 border rounded">
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
                        <label for="idTipo">Tipo</label><br>
                        <select id="idTipo" class="w-full p-2 border rounded">
                            @foreach ($tipos as $ti)
                            <option id="{{$ti->id}}">{{$ti->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idFormato">Formato</label><br>
                        <select id="idFormato" class="w-full p-2 border rounded">
                            @foreach ($formatos as $fo)
                            <option id="{{$fo->id}}">{{$fo->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idCalidad">Calidad</label><br>
                        <select id="idCalidad" class="w-full p-2 border rounded">
                            @foreach ($calidades as $ca)
                            <option id="{{$ca->id}}">{{$ca->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idUsuario">Usuario</label><br>
                        <select id="idUsuario" class="w-full p-2 border rounded">
                            @foreach ($usuarios as $us)
                            <option id="{{$us->id}}">{{$us->email}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idSede">Sede</label><br>
                        <select id="idSede" class="w-full p-2 border rounded">
                            @foreach ($sedes as $se)
                            <option id="{{$se->id}}">{{$se->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-6 mt-4">
            <form id="modal_update" class="bg-white p-4 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label for="fecha2" class="block text-gray-700 font-medium mb-1">Fecha de recolección:</label>
                    <input type="date" id="fecha2" name="fecha" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="codigo2" class="block text-gray-700 font-medium mb-1">Código muestra:</label>
                    <input type="text" id="codigo2" name="codigo" placeholder="Código" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="organo2" class="block text-gray-700 font-medium mb-1">Órgano:</label>
                    <select id="organo2" name="organo" class="w-full p-2 border rounded">
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
                        <label for="idTipo2">Tipo</label><br>
                        <select id="idTipo2" class="w-full p-2 border rounded">
                            @foreach ($tipos as $ti)
                            <option id="{{$ti->id}}">{{$ti->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idFormato2">Formato</label><br>
                        <select id="idFormato2" class="w-full p-2 border rounded">
                            @foreach ($formatos as $fo)
                            <option id="{{$fo->id}}">{{$fo->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idCalidad2">Calidad</label><br>
                        <select id="idCalidad2" class="w-full p-2 border rounded">
                            @foreach ($calidades as $ca)
                            <option id="{{$ca->id}}">{{$ca->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idUsuario2">Usuario</label><br>
                        <select id="idUsuario2" class="w-full p-2 border rounded">
                            @foreach ($usuarios as $us)
                            <option id="{{$us->id}}">{{$us->email}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                    <div>
                        <label for="idSede2">Sede</label><br>
                        <select id="idSede2" class="w-full p-2 border rounded">
                            @foreach ($sedes as $se)
                            <option id="{{$se->id}}">{{$se->nombre}}</option>
                            @endforeach
                        </select><br> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

