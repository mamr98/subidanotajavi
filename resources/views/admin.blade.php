@extends('adminlte::page')
<meta content="{{ csrf_token() }}" name="csrf-token" />

@section('content')
<button style=" margin-left: 28%; padding: 10px 20px; background-color: black; color: white; border: none; border-radius: 5px; cursor: pointer;" id = "crear_usuario">Crear usuario</button>
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

      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          Rol
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          Estado
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          Id Sede
        </p>
      </th>
      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
          Acciones
        </p>
      </th>
      
      
    </tr>
  </thead>
  <tbody id="mostrar_usuario">
    @foreach ($usuarios as $u)
      <tr>
        <td class="p-4 border-b border-blue-gray-50">
            
      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->id }}</p>

          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">

            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->email }}</p>

          </p>
        </td>
        <td class="p-4 border-b border-blue-gray-50">

            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->password }}</p>

          </p>
        </td>

      </td>
      <td class="p-4 border-b border-blue-gray-50">

          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->rol }}</p>

        </p>
      </td>
    </td>
    <td class="p-4 border-b border-blue-gray-50">

        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->estado }}</p>

      </p>
    </td>
    <td class="p-4 border-b border-blue-gray-50">

        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $u->idSede }}</p>

      </p>
    </td>
    <td id="botones">
      <button style="padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="modificar">Modificar</button>
      <button style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="desactivar">Desactivar</button>
      <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" id="{{$u->id}}" class="activar">Activar</button>
      
      
    </td>        
      </tr>
      @endforeach

    </tbody>
</table>

<form id="modal">
  @csrf
  <label for="email">Email</label><br>
  <input type="text" id="email"/><br>

  <label for="password">Contraseña</label><br>
  <input type="text" id="password"/><br> 

  <label for="rol">Rol</label><br>
  <select id="rol">
      <option value="usuario">Usuario</option>
      <option value="administrador">Administrador</option>
  </select><br> 

  <label for="estado">Estado</label><br>
  <select id="estado">
      <option value="1">Activo</option>
      <option value="0">Pausado</option>
  </select><br> 

  <label for="idSede">Sede</label><br>
  <select id="idSede">
      @foreach ($sedes as $se)
      <option id="{{$se->id}}">{{$se->nombre}}</option>
      @endforeach
  </select><br> 
</form>

<form id="modal_update">
  @csrf
  <label for="email">Email</label><br>
  <input type="text" id="email2"/><br>

  <label for="password">Contraseña</label><br>
  <input type="text" id="password2"/><br> 

  <label for="rol">Rol</label><br>
  <select id="rol2">
      <option value="usuario">Usuario</option>
      <option value="administrador">Administrador</option>
  </select><br> 

  <label for="estado2">Estado</label><br>
  <select id="estado2">
      <option value="1">Activo</option>
      <option value="0">Pausado</option>
  </select><br> 

  <label for="idSede">Sede</label><br>
  <select id="idSede2">
      @foreach ($sedes as $se)
      <option id="{{$se->id}}">{{$se->nombre}}</option>
      @endforeach
  </select><br> 
</form>
</div>
@endsection
@vite(['resources/js/app.js'])
