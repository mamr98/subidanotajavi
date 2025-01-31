@extends('adminlte::page')

@section('content')
<button id = "crear_usuario">Crear usuario</button>
<button id = "eliminar_usuario">Eliminar usuario</button>
<button id = "modificar_contrasena">Modificar contraseña</button>
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
          Email
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          Contraseña
        </p>
      </th>
      
      
    </tr>
  </thead>
  <tbody id="mostrar_usuario">
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
            @foreach ($usuarios as $u)
      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->id }}</p>
    @endforeach
          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
            @foreach ($usuarios as $u)
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->email }}</p>
          @endforeach
          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          @foreach ($usuarios as $u)
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->password }}</p>
          @endforeach
            
          </p>
        </td>
        
      </tr>

    </tbody>
</table>
</div>
@endsection
@vite(['resources/js/app.js'])