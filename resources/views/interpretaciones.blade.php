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

  <h1 class="flex items-center text-sky-950 text-5xl mt-32 justify-center font-bold">Añadir interpretaciones</h1>
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg mb-60 w-full max-w-4xl">
      <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Calidad de la muestra -->
        <div>
          <label for="calidad" class="block text-sm font-bold text-sky-800">Calidad de la muestra:</label>
          <select id="calidad" name="calidad" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option></option>
            <option></option>
            <option></option>
          </select>
        </div>
  
        <!-- Descripcion calidad -->
        <div>
          <label for="descripcionCalidad" class="block text-sm font-bold text-sky-800">Descripción calidad:</label>
          <textarea name="descripcionCalidad" id="descripcionCalidad" class="mt-1 border-2 border-sky-800 focus:border-blue-700 focus:ring-2 focus:ring-blue-300 rounded-lg p-2 w-full h-40"></textarea>
        </div>
  
        <!-- Interpretación de la muestra -->
        <div>
          <label for="interpretacionMuestra" class="block text-sm font-bold text-sky-800">Interpretación de la muestra:</label>
          <select id="interpretacionMuestra" name="interpretacionMuestra" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option></option>
            <option></option>
            <option></option>
          </select>
        </div>
  
        <!-- Descripcion interpretación -->
        <div>
          <label for="descripcionInterpretacion" class="block text-sm font-bold text-sky-800">Descripción interpretación:</label>
          <textarea name="descripcionInterpretacion" id="descripcionInterpretacion" class="mt-1 border-2 border-sky-800 focus:border-blue-700 focus:ring-2 focus:ring-blue-300 rounded-lg p-2 w-full h-40"></textarea>
        </div>
        
        <!-- Botones -->
        <div class="col-span-2 flex justify-end space-x-4">
          <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Volver</button>
          <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Añadir interpretación</button>
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Siguiente</button>
        </div>
      </form>
    </div>
  </div>
  
</body>
@vite(['resources/css/app.css'])
</html>