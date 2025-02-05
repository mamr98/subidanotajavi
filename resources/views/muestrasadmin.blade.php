@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<button class="ml-[40%] px-5 py-2 bg-black text-white rounded-md cursor-pointer" id = "crear_usuario">Crear muestra</button>
<div
class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
<table class="w-full text-left table-auto min-w-max">
  <thead>
    <tr>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          ID
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Código muestra
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Fecha de recolección
        </p>
      </th>

      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Naturaleza de la muestra
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Opciones de biopsia
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Conservación de la muestra
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Centro de procedencia
        </p>
      </th>

      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Imágenes de la muestra
        </p>
      </th>

      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Acciones
        </p>
      </th>
      
      
    </tr>
  </thead>
  <tbody id="">
    {{-- @foreach ($usuarios as $u) --}}
      <tr>

        <td class="p-4 border-b border-blue-gray-50">
            
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->id }} --}}1</p>
      
                </p>
              </td>

        <td class="p-4 border-b border-blue-gray-50">
            
      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->id }} --}}EX24002</p>

          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">

            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->email }} --}} 14/02/2025</p>

          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">

            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->password }} --}} Biopsia</p>

          </p>
        </td>

      </td>
      <td class="p-4 border-b border-blue-gray-50">

          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->rol }} --}} Corazón</p>

        </p>
      </td>
    </td>
    <td class="p-4 border-b border-blue-gray-50">

        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->estado }} --}} Fresco </p>

      </p>
    </td>
    <td class="p-4 border-b border-blue-gray-50">

        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{-- {{ $u->idSede }} --}} Córdoba</p>

      </p>
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        <img id="img" src="" alt="img">
    </td>
    <td id="botones" class="flex flex-col gap-2">
      <button class="px-5 py-2 bg-blue-500 text-white border-none rounded-md cursor-pointer"{{-- id="{{$u->id}}" --}} class="modificar">Modificar</button>
      <button class="px-5 py-2 bg-red-600 text-white border-none rounded-md cursor-pointer"  {{-- id="{{$u->id}}" --}} class="desactivar">Desactivar</button>
      <button class="px-5 py-2 bg-green-500  text-white border-none rounded-md cursor-pointer" {{-- id="{{$u->id}}" --}} class="activar">Activar</button>
    </td>        
      </tr>
      
      {{-- @endforeach --}}

    </tbody>
</table>

<form id="modal">
  @csrf
  <label for="">Email</label><br>
  <input type="text" id=""/><br>

  <label for="">Contraseña</label><br>
  <input type="text" id=""/><br> 

  <label for="">Rol</label><br>
  <select id="">
      <option value="usuario">Usuario</option>
      <option value="administrador">Administrador</option>
  </select><br> 

  <label for="">Estado</label><br>
  <select id="">
      <option value="1">Activo</option>
      <option value="0">Pausado</option>
  </select><br> 

  <label for="">Sede</label><br>
  <select id="">
      {{-- @foreach ($sedes as $se)
      <option id="{{$se->id}}">{{$se->nombre}}</option>
      @endforeach --}}
  </select><br> 
</form>

<form id="modal_update">
  @csrf
  <label for="">Email</label><br>
  <input type="text" id=""/><br>

  <label for="">Contraseña</label><br>
  <input type="text" id=""/><br> 

  <label for="">Rol</label><br>
  <select id="">
      <option value="usuario">Usuario</option>
      <option value="administrador">Administrador</option>
  </select><br> 

  <label for="">Estado</label><br>
  <select id="">
      <option value="1">Activo</option>
      <option value="0">Pausado</option>
  </select><br> 

  <label for="">Sede</label><br>
  <select id="">
      {{-- @foreach ($sedes as $se)
      <option id="{{$se->id}}">{{$se->nombre}}</option>
      @endforeach --}}
  </select><br> 
</form>
</div>
@endsection
@vite(['resources/css/app.css','resources/js/app.js'])