<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('logoMedac.ico')}}" type="image/x-icon">
    <title>Muestra</title>
    @vite(['resources/css/app.css'])
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

    <!-- Título -->
    <h1 class="flex items-center text-4xl text-sky-950 mt-6 justify-center font-bold">Informe de muestra</h1>

    <div class="flex justify-center mt-6">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-6xl">
            <!-- Información de la muestra -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <span class="bg-gray-200 px-4 py-2 rounded-lg text-gray-700">Código de la muestra: 804003</span>
                <span class="bg-gray-200 px-4 py-2 rounded-lg text-gray-700">Fecha muestra: 2024-05-31</span>
                <span class="bg-gray-200 px-4 py-2 rounded-lg text-gray-700">Correo Usuario: correo@medac.es</span>
            </div>

            <!-- Información de la muestra con <p> -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Naturaleza de la muestra</label>
                    <p class="w-full p-2 border rounded-md bg-gray-100 text-gray-700">Formol</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Conservación de la muestra</label>
                    <p class="w-full p-2 border rounded-md bg-gray-100 text-gray-700">Formol</p>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Descripción citológica o titular de la muestra</label>
                <p class="w-full p-2 border rounded-md bg-gray-100 text-gray-700">Datos de la muestra</p>
            </div>

            <!-- Imágenes estandarizadas -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <img src="{{ asset('image1.jpg') }}" alt="img1" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <p class="w-full mt-2 p-2 border rounded-md bg-gray-100 text-gray-700 text-center">Tipo de aumento</p>
                </div>
                <div>
                    <img src="{{ asset('image2.jpg') }}"alt="img2" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <p class="w-full mt-2 p-2 border rounded-md bg-gray-100 text-gray-700 text-center">Tipo de aumento</p>
                </div>
                <div>
                    <img src="{{ asset('image3.jpg') }}"alt="img3" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <p class="w-full mt-2 p-2 border rounded-md bg-gray-100 text-gray-700 text-center">Tipo de aumento</p>
                </div>
                <div>
                    <img src="{{ asset('image4.jpg') }}"alt="img4" class="w-full h-40 object-cover rounded-lg shadow-md">
                    <p class="w-full mt-2 p-2 border rounded-md bg-gray-100 text-gray-700 text-center">Tipo de aumento</p>
                </div>
                
            </div>

            <!-- Descripciones -->
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-700 bg-gray-200 p-2 rounded-lg">Descripciones</h2>
                <div class="mt-2 p-4 border rounded-md bg-gray-100">
                    <strong>Titulo Anotación1</strong>
                    <p>Anotacion1</p>
                </div>
                <div class="mt-2 p-4 border rounded-md bg-gray-100">
                    <strong>Titulo Anotación2</strong>
                    <p>Anotacion2</p>
                </div>
            </div>
            
                
            
        </div>
    </div>
</body>

</html>
