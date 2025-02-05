<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('logoMedac.ico')}}" type="image/x-icon">
    <title>Informes</title>
</head>
<body class="bg-slate-200">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <img class="w-22 h-12" src="{{asset('LogoMedac.png')}}" alt="Logo medac">
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <a href="{{ route('logout') }}"><button type="button" class="text-white font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cerrar Sesion</button>
      </button></a>
    </div>
      <div class="flex-1 flex justify-center md:order-1">
            @isset($email)
            <span class="text-lg hover:text-blue-500 font-semibold whitespace-nowrap dark:text-white">Has iniciado sesion con {{$email}}</span>
            @endisset
        </div>
    </div>
  </nav>

  <h1 class="flex items-center text-5xl text-sky-950 mt-32 justify-center font-bold">Generar informes</h1>
<div class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg shadow-lg mb-60 w-full max-w-4xl">
      <form {{-- action="{{ route('muestra.store') }}" method="POST" --}} class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Código de la muestra -->
          <div>
              <label for="codigo" class=" block text-sm font-bold text-sky-800">Código de la muestra:</label>
              <input type="text" id="codigo" name="codigo" placeholder="Código" class=" border-2 mt-1 block w-full  rounded-md border-sky-800">
          </div>

          <!-- Fecha de recolección -->
          <div>
              <label for="fecha" class=" ml-4 block text-sm font-bold text-sky-800">Fecha de recolección:</label>
              <input type="date" id="fecha" name="fecha" class=" ml-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>

          <!-- Naturaleza de la muestra -->
          <div>
              <label for="naturaleza" class="block text-sm font-bold text-sky-800">Naturaleza de la muestra:</label>
              <select id="naturaleza" name="naturaleza" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  
              </select>
          </div>

          <!-- Opciones biopsia -->
          <div>
              <label for="biopsia" class=" ml-4 block text-sm font-bold text-sky-800">Opciones biopsia:</label>
              <select id="biopsia" name="biopsia" class=" ml-4 mt-1 block w-full  rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
              </select>
          </div>

          <!-- Conservación de muestra -->
          <div>
              <label for="conservacion" class="block text-sm font-bold text-sky-800">Conservación de muestra:</label>
              <select id="conservacion" name="conservacion" class="mt-1 block w-full  rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option></option>
                  <option></option>
                  <option></option>
              </select>
          </div>

          <!-- Centro de procedencia -->
          <div>
              <label for="centro" class=" ml-4 block text-sm font-bold text-sky-800">Centro de procedencia:</label>
              <select id="centro" name="centro" class=" ml-4 mt-1 block w-full  rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option></option>
                  <option value=""></option>
                  <option value=""> </option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
              </select>
          </div>

          <!-- Imágenes de la muestra -->
          <div class="md:col-span-2">
              <label class="block text-sm  text-sky-800 font-bold">Imágenes de la muestra:</label>
              <input type="file" id="imagenes" name="imagenes" class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
              <button class="px-6 py-2 mt-4 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">+</button>
          </div>

          <!-- Botón Siguiente -->
          <div class="md:col-span-2 flex justify-end">
             <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Siguiente</button>
          </div>
      </form>
  </div>
</div>
</body>
@vite(['resources/css/app.css'])
</html>

{{-- <h1>Muestras</h1>
    @foreach ($muestras as $m)
      <p>{{ $m->id }} {{ $m->fecha }} {{ $m->tipo->nombre }}</p>
    @endforeach --}}
 

  