<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('logoMedac.ico')}}" type="image/x-icon">
    <title>Inicio</title>
</head>
<body class="bg-slate-200">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 w-100 px-8 md:px-auto">
        <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <div class="md:order-1 flex items-center space-x-3 rtl:space-x-reverse">
                <img class="w-22 h-12" src="{{asset('LogoMedac.png')}}" alt="Logo medac">
            </div>
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
                <span class="self-center text-4xl font-semibold whitespace-nowrap hover:text-blue-600 dark:text-white">Informes citodiagnósticos</span>
            </div>
            <div class="order-2 md:order-3">
                <a href="{{route('logout')}}">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-800 text-gray-50 rounded-xl flex items-center gap-2">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Login</span>
                </button></a>
            </div>
        </div>
    </nav>
      
  
  <h1 class="flex items-center text-sky-950 text-5xl mt-28 -mb-44 justify-center font-bold">Generar informes citodiagnóstico</h1>
  <div class="min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg mb-10 inline-block max-w-fit">
        <h1 class="flex text-sky-950 justify-center font-bold">Ver/crear muestras</h1>
        <a href="{{route('listamuestras')}}">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ver muestras</button>
          </a>
        
</body>
@vite(['resources/css/app.css', 'resources/js/inicio.js'])
</html>