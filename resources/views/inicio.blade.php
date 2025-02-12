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

<body class="bg-slate-100">
    <nav class="bg-gray-900 text-white shadow-md top-0 z-50 sticky">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <div class="flex items-center space-x-2">
                <span class="text-lg font-semibold">MEDAC</span>
            </div>
            <img src="{{ asset('LogoMedac.png') }}" alt="Logo Medac" class="h-10">
    
            <div class="hidden md:flex items-center space-x-4">
                @isset($email)
                    <span class="text-gray-300 text-sm">Sesión: {{ $email }}</span>
                @endisset
                <a href="{{ route('logout') }}" class="px-4 py-2 bg-blue-600 rounded-md hover:bg-blue-700 transition">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 text-white p-4 space-y-3">
            @isset($email)
                <p class="text-sm text-gray-300">Sesión: {{ $email }}</p>
            @endisset
            <a href="{{ route('logout') }}" class="block mt-2 px-4 py-2 bg-blue-600 rounded-md text-center hover:bg-blue-700">
                Iniciar Sesión
            </a>
        </div>
    
    </nav>
    
    <header class="relative w-full h-[460px] bg-cover bg-center" style="background-image: url('image.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
            <h1 class="text-white text-5xl font-bold">Bienvenido a Laboratorio Medac</h1>
            <div class="mt-4">
                <p class="text-lg text-center font-bold text-white max-w-4xl">
                    Gestión avanzada y segura de muestras para investigaciones científicas de laboratorio. Precisión, trazabilidad y tecnología al servicio de la ciencia.
                </p>
            </div>
        </div>
    </header>
    
    <section class="container mx-auto p-14 text-center max-w-6xl">
        <h2 class="text-3xl font-semibold mb-4">Web de gestión de muestras Medac</h2>
        <p class="text-gray-700">Bienvenido a la plataforma de gestión de muestras Medac, diseñada para facilitar el proceso de creación, administración y visualización de muestras de manera eficiente y organizada. Nuestra web ofrece herramientas intuitivas y funcionalidades avanzadas para que puedas optimizar tu trabajo y mejorar la experiencia de gestión. ¡Explora todo lo que tenemos para ofrecerte y comienza a gestionar tus muestras de forma sencilla y segura!</p>
    </section>

    <section class="bg-sky-700 mx-auto px-4 py-12">
        <div class="max-w-screen-xl mx-auto grid md:grid-cols-3 gap-6">
            <div class="relative h-64 bg-cover bg-center flex flex-col justify-center items-center text-white p-6 rounded-lg shadow-lg hover:transform hover:-translate-y-2 transition duration-300" style="background-image: url('gestion.png');">
                <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg"></div>
                <h2 class="relative text-2xl font-bold">Gestión de Muestras</h2>
                <p class="relative mt-2 text-center">Organiza y gestiona tus muestras de manera eficiente y segura.</p>
            </div>
    
            <div class="relative h-64 bg-cover bg-center flex flex-col justify-center items-center text-white p-6 rounded-lg shadow-lg hover:transform hover:-translate-y-2 transition duration-300" style="background-image: url('seguimiento.png');">
                <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg"></div>
                <h2 class="relative text-2xl font-bold">Seguimiento Integral</h2>
                <p class="relative mt-2 text-center">Monitoreación de cada muestra, garantizando transparencia y control en todo momento.</p>
            </div>
    
            <div class="relative h-64 bg-cover bg-center flex flex-col justify-center items-center text-white p-6 rounded-lg shadow-lg hover:transform hover:-translate-y-2 transition duration-300" style="background-image: url('seguridad.png');">
                <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg"></div>
                <h2 class="relative text-2xl font-bold">Seguridad y Control</h2>
                <p class="relative mt-2 text-center">Mantén la seguridad de tus muestras con nuestros controles avanzados.</p>
            </div>
        </div>
    </section>
    
    <section class="bg-gray-100 p-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6">
                        <img src="david.png" alt="David Peláez" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold text-center">David Peláez</h3>
                    <p class="text-gray-600 text-center">Desarrollador Frontend</p>
                </div>
    
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6">
                        <img src="marcos.png" alt="Marcos García" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold text-center">Marcos García</h3>
                    <p class="text-gray-600 text-center">Desarrollador Backend</p>
                </div>
    
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6">
                        <img src="pablo.png" alt="Pablo Gallego" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold text-center">Pablo Gallego</h3>
                    <p class="text-gray-600 text-center">Diseñador</p>
                </div>
    
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6">
                        <img src="miguel.png" alt="Miguel Ángel Milena" class="w-full h-full rounded-full object-cover">
                    </div>
                    <h3 class="text-2xl font-bold text-center">Miguel Ángel Milena</h3>
                    <p class="text-gray-600 text-center">Gestor BBDD</p>
                </div>
            </div>
        </div>
    </section>



    <footer class="bg-gray-900 text-white py-8">
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
