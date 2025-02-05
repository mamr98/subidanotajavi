<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('logoMedac.ico')}}" type="image/x-icon">
    <title>Interpretaciones</title>
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

  
  <h1 class="flex items-center text-sky-950 text-5xl mt-28 -mb-44 justify-center font-bold">Lista muestras</h1>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg mb-10 inline-block max-w-fit">
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
                </tr>
            </thead>
            <tbody id="mostrar_usuario">
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">1</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">EX24002</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">14/02/2025</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Biopsia</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Corazón</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Fresco</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">Córdoba</p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <img id="img" src="" alt="img">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Crear muestra
    </button>
</div>
<form class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Código de la muestra -->
    <div>
        <label for="codigo" class="block text-sm font-bold text-sky-800">Código de la muestra:</label>
        <input type="text" id="codigo" name="codigo" placeholder="Código" class="border-2 mt-1 block w-full rounded-md border-sky-800">
    </div>

    <!-- Fecha de recolección -->
    <div>
        <label for="fecha" class="ml-4 block text-sm font-bold text-sky-800">Fecha de recolección:</label>
        <input type="date" id="fecha" name="fecha" class="ml-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Naturaleza de la muestra -->
    <div>
        <label for="naturaleza" class="block text-sm font-bold text-sky-800">Naturaleza de la muestra:</label>
        <select id="naturaleza" name="naturaleza" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value=""></option>
        </select>
    </div>

    <!-- Opciones biopsia -->
    <div>
        <label for="biopsia" class="ml-4 block text-sm font-bold text-sky-800">Opciones biopsia:</label>
        <select id="biopsia" name="biopsia" class="ml-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value=""></option>
        </select>
    </div>

    <!-- Conservación de muestra -->
    <div>
        <label for="conservacion" class="block text-sm font-bold text-sky-800">Conservación de muestra:</label>
        <select id="conservacion" name="conservacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option></option>
        </select>
    </div>

    <!-- Centro de procedencia -->
    <div>
        <label for="centro" class="ml-4 block text-sm font-bold text-sky-800">Centro de procedencia:</label>
        <select id="centro" name="centro" class="ml-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option></option>
        </select>
    </div>

    <!-- Imágenes de la muestra -->
    <div class="md:col-span-2">
        <label class="block text-sm text-sky-800 font-bold">Imágenes de la muestra:</label>
        <input type="file" id="imagenes" name="imagenes" class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        <button class="px-6 py-2 mt-4 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">+</button>
    </div>

    <div class="col-span-2 mt-4 flex justify-end space-x-4">
      <a href="{{route('interpretaciones')}}">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Siguiente</button>
      </a>
    </div>
</form>
</body>
@vite(['resources/css/app.css'])
</html>

{{-- @foreach ($usuarios as $u) --}}
{{-- {{ $u->id }} --}}
{{-- @endforeach --}}