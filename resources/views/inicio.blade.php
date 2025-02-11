<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('logoMedac.ico') }}" type="image/x-icon">
    <title>Inicio</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-slate-200">
    <nav class="bg-[#111828] border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <img class="w-22 h-12" src="{{ asset('LogoMedac.png') }}" alt="Logo medac">
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ route('logout') }}"><button type="button"
                        class="px-4 py-2 bg-blue-600 font-semibold text-white rounded-md shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Iniciar Sesión</button>
                    </button></a>
            </div>
            <div class="flex-1 flex justify-center md:order-1">
                @isset($email)
                    <span class="text-lg hover:text-blue-500 font-semibold whitespace-nowrap dark:text-white">Has iniciado
                        sesion con {{ $email }}</span>
                @endisset
            </div>
        </div>
    </nav>
    <header class="relative w-full h-[570px] bg-cover bg-center" style="background-image: url('portada.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
            <h1 class="text-white text-5xl font-bold">Bienvenido a Gestor de Muestras</h1>
            <div class="mt-4">
                <a href="{{ route('logout') }}">
                    <button type="button"
                        class="text-white bg-blue-600 font-medium rounded-lg text-xl px-4 py-2 text-center hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                        Crear Muestra
                    </button>
                    <button type="button"
                        class="text-white bg-blue-600 font-medium rounded-lg text-xl px-4 py-2 text-center hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                         Ver Muestras
                    </button>
                </a>
            </div>
        </div>
    </header>


    <section class="container mx-auto p-8 text-center">
        <h2 class="text-3xl font-semibold mb-4">Web de gestión de muestras Medac</h2>
        <p class="text-gray-700">Bienvenido a la plataforma de gestión de muestras Medac, diseñada para facilitar el proceso de creación, administración y visualización de muestras de manera eficiente y organizada. Nuestra web ofrece herramientas intuitivas y funcionalidades avanzadas para que puedas optimizar tu trabajo y mejorar la experiencia de gestión. ¡Explora todo lo que tenemos para ofrecerte y comienza a gestionar tus muestras de forma sencilla y segura!</p>
    </section>

    <footer class="bg-gray-900 text-white py-6 mt-8">
        <div class="max-w-screen-xl mx-auto text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="text-gray-400 hover:text-white">Sobre nosotros</a>
                <a href="#" class="text-gray-400 hover:text-white">Política de privacidad</a>
                <a href="#" class="text-gray-400 hover:text-white">Términos y condiciones</a>
            </div>
            <div class="text-gray-400">
                <p>&copy; 2025 Medac. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>    

</body>


</html>
