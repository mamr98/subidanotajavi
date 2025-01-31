<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-slate-400 min-h-screen flex items-center justify-center">
  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
      <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Código de la muestra -->
          <div>
              <label for="codigo" class="block text-sm font-bold text-sky-800">Código de la muestra:</label>
              <input type="text" id="codigo" name="codigo" placeholder="Código" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>

          <!-- Fecha de recolección -->
          <div>
              <label for="fecha" class="block text-sm font-bold text-sky-800">Fecha de recolección:</label>
              <input type="date" id="fecha" name="fecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
          </div>

          <!-- Naturaleza de la muestra -->
          <div>
              <label for="naturaleza" class="block text-sm font-bold text-sky-800">Naturaleza de la muestra:</label>
              <select id="naturaleza" name="naturaleza" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option>Tipo</option>
              </select>
          </div>

          <!-- Opciones biopsia -->
          <div>
              <label for="biopsia" class="block text-sm font-bold text-sky-800">Opciones biopsia:</label>
              <select id="biopsia" name="biopsia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option>Órgano</option>
              </select>
          </div>

          <!-- Conservación de muestra -->
          <div>
              <label for="conservacion" class="block text-sm font-bold text-sky-800">Conservación de muestra:</label>
              <select id="conservacion" name="conservacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option>Formato</option>
              </select>
          </div>

          <!-- Centro de procedencia -->
          <div>
              <label for="centro" class="block text-sm font-bold text-sky-800">Centro de procedencia:</label>
              <select id="centro" name="centro" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  <option>Sede</option>
              </select>
          </div>

          <!-- Imágenes de la muestra -->
          <div class="md:col-span-2">
              <label for="imagenes" class="block text-sm  text-sky-800 font-bold">Imágenes de la muestra:</label>
              <input type="file" id="imagenes" name="imagenes" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          </div>

          <!-- Botón Siguiente -->
          <div class="md:col-span-2 flex justify-end">
              <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Siguiente</button>
          </div>
      </form>
  </div>
</body>
@vite(['resources/css/app.css'])
</html>

{{-- <h1>Muestras</h1>
    @foreach ($muestras as $m)
      <p>{{ $m->id }} {{ $m->fecha }} {{ $m->tipo->nombre }}</p>
    @endforeach --}}

  {{-- <h1>Has iniciado Sesion con {{$email}}</h1> --}}
  
{{--   <button id="cerrar_sesion">Cerrar Sesion</button> --}}