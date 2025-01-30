@extends('adminlte::page')

@section('content')
<button id = "crear-usuario">Crear usuario</button>
<button id = "eliminar-usuario">Eliminar usuario</button>
<button id = "modificar-usuario">Modificar usuario</button>
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
  <tbody>
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
            
          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
              
          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
            
          </p>
        </td>
        
      </tr>

    </tbody>
</table>
</div>
@endsection
@vite(['resources/js/app.js'])