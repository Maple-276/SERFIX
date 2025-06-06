<!-- filepath: /c:/Users/Asus/Desktop/Servix/resources/views/layouts/app.blade.php -->
<!doctype html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <!-- CSRF Token -->  
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <!-- Fonts -->  
    <link rel="dns-prefetch" href="//fonts.bunny.net">  
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">  

    <!-- Bootstrap 4 -->  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>  

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Custom Styles -->  
    <link href="{{ asset('assets/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">  
</head>  
<body>  
    <div id="app">  
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
            <div class="container"> <!-- Agregar contenedor padre -->
                <div class="d-flex align-items-center"> <!-- Contenedor para logo y texto -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('storage/images/Logo_Servix.jpg') }}" class="img-circle" alt="Logo">
                        <h2 class="">Servix</h2>
                    </a>
                </div>
                
                <div class="d-flex align-items-center"> <!-- Contenedor para elementos derecha -->
                    <ul class="navbar-nav">
                        <li class="nav-item active"> 
                            <a class="nav-link" href="#">Demo <span class="sr-only">(current)</span></a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#">Contactanos</a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#">Explorar Servicios</a> 
                        </li>                      
                        <li class="nav-item2"> 
                            <a class="nav-link" href="#">Suscribirse</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('login') }}">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </li>
                    </ul>
                    <button id="toggle-dark-mode" class="btn btn-secondary ml-3">
                        <i id="dark-mode-icon" class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </nav>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('content') <!-- Agrega esta línea para incluir el contenido de la sección 'content' -->
            </div>
        </div> 

        <!-- Footer -->
        <footer class="footer">
            @include('layouts.footer')
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script> <!-- Menu Toggle Script -->
    </div>
</body>  
</html>