<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <title>AdminLTE 3 | Registro</title>
    <link rel="shortcut icon" href="{{ asset('logoMedac.ico') }}" type="image/x-icon">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        .login-box {
                margin-bottom: 60px;
            }

        @media (min-width: 321px) and (max-width: 509px) {
            .login-box {
                margin-bottom: 100px;
            }
        }
        @media (max-width: 362px) {
            .login-box {
                margin-bottom: 130px;
                margin-top:10px; 
            }
        }
    </style>
</head>
<body class="hold-transition login-page">
    <nav class="navbar navbar-expand-lg navbar-dark bg-navy shadow fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('LogoMedac.png') }}" alt="Logo Medac" class="me-2" height="40">
            </a>
            <div class="text-center flex-grow-1">
                <span class="text-white" style="font-size: 1rem; font-weight: 500;">MEDAC</span>
            </div>
            <div class="justify-content-end" id="navbarContent">
                @isset($email)
                    <span class="navbar-text text-light me-3">Sesión: {{ $email }}</span>
                @endisset
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
            </div>
        </div>
    </nav>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Registrate</p>

           
                <div class="input-group mb-3">
                    <input type="email" class="form-control email" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control contraseña" placeholder="Contraseña" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="idSede" class="block text-gray-700 font-medium mb-2 mr-2 mt-2">Sede</label>
                    <select id="idSede" class="w-full p-2 border rounded">
                    </select>
                </div>
                <span class="mr-2">Si tienes una cuenta </span><a href="{{route('login')}}">Inicia Sesión</a>
                <div class=" mt-2 row">
                    <div class="col-5">
                       <a href="{{route('login')}}"><button type="submit" class="btn btn-primary btn-block registrar" style="white-space: nowrap;">Registrar</button></a> 
                    </div>
                </div>
        </div>
    </div>
</div>
<footer class="bg-navy text-white py-3 w-100 fixed-bottom">
    <div class="container">
        <div class="row align-items-center">
            <!-- Primera columna: Enlaces -->
            <div class="col-md-4 text-md-left text-center mb-2 mb-md-0">
                <a href="#" class="text-light d-block">Sobre nosotros</a>
                <a href="#" class="text-light d-block">Política de privacidad</a>
                <a href="#" class="text-light d-block">Términos y condiciones</a>
            </div>


            <div class="col-md-4 text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Medac. Todos los derechos reservados.</p>
            </div>

            <div class="col-md-4 text-md-right text-center">
                <a href="https://www.instagram.com/institutomedac/?hl=es" target="_blank" class="text-light mx-2">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=61572362099718" target="_blank" class="text-light mx-2">
                    <i class="fab fa-facebook fa-lg"></i>
                </a>
                <a href="https://es.linkedin.com/school/davante-medac/" target="_blank" class="text-light mx-2">
                    <i class="fab fa-linkedin fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
@vite(['resources/js/registro.js'])
