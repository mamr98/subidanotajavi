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

  <h1 class="flex items-center text-sky-950 text-5xl mt-32 -mb-20 justify-center font-bold">Zoom imágenes</h1>
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg mb-60 w-full max-w-4xl">
      <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        
        <div>
            <img id="img1" src="" alt="img1">
            <select id="zoomImg1" name="zoomImg1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option></option>
                <option></option>
                <option></option>
          </select>
        </div>
  
        <div>
            <img id="img2" src="" alt="img2">
            <select id="zoomImg2" name="zoomImg2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option></option>
                <option></option>
                <option></option>
          </select>
        </div>
  

        <div>
            <img id="img3" src="" alt="img3">
            <select id="zoomImg3" name="zoomImg3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option></option>
                <option></option>
                <option></option>
          </select>
        </div>
  
        <div>
            <img id="img4" src="" alt="img4">
            <select id="zoomImg4" name="zoomImg4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option></option>
                <option></option>
                <option></option>
              </select>
        </div>
        
        <!-- Botones -->
        <div class="col-span-2 flex justify-end space-x-4">
          <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Volver</button>
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Siguiente</button>
        </div>
      </form>
    </div>
  </div>
  
</body>
@vite(['resources/css/app.css'])
</html>