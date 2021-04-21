<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b48ddbb3b7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/acceso.css')}}">
</head>
<body>
    <h1 style="display:none">Conexist</h1>
    <div class = "body-base">
        <video type="video/mp4" src="{{asset('media/fondo_home.mp4')}}" onloadedmetadata="this.muted=true" autoplay loop></video>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-movil">
            <div class="nav-izq">
                <div class="logo">
                    <a href="{{route('inicio')}}"><img src="{{asset('img/logo3.png')}}" alt="Conexist"></a>
                </div>
            </div>
            <div class="nav-der">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="">
                        <a class="" href="{{route('inicio')}}">Inicio</a>
                    </li>
                    <li class="">
                        <a class="" href="#">Documentación</a>
                    </li>
                    <li class="">
                        <a class="" href="/#servicios">Servicios</a>
                    </li>
                    <li class="">
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="">
                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
            </div>
        </nav>   
        <div id="nav-pc">
            <nav class="navbar navbar-expand-lg navbar-light" >
                <div class="nav-izq">
                    <div class="logo">
                        <a href="{{route('inicio')}}"><img src="{{asset('img/logo3.png')}}" alt="Conexist"></a>
                    </div>
                </div>
                <div class="nav-der">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="">
                            <a class="" href="{{route('inicio')}}">Inicio</a>
                        </li>
                        <li class="">
                            <a class="" href="#">Documentación</a>
                        </li>
                        <li class="">
                            <a class="" href="/#servicios">Servicios</a>
                        </li>
                        <li class="">
                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="">
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        </header>

        <section>
            @yield('content')
        </section>
        <footer class="bg-dark">    
            <div class="foo-center">
                <div class="redes-s">
                    <div class="rs-caja"><i class="fab fa-instagram"></i></div>
                    <div class="rs-caja"><i class="fab fa-facebook"></i></div>
                    <div class="rs-caja"><i class="fab fa-twitter"></i></div>
                </div>
                <p>conexistsoftware@gmail.com</p>
            </div>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>