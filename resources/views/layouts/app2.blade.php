<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VenStock</title>
    <link rel="stylesheet" href="{{asset('css/estilos2.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b48ddbb3b7.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="nav-izq">
                <div class="logo">
                    <a href="#"><img src="{{asset('img/logo.png')}}" alt="VenStock"></a>
                </div>
                <div class="logo-txt">
                    <h1>VenStock</h1>
                </div>
            </div>
            <div class="nav-der">
                <div class="perfil">
                <ul>
                    <i class="fas fa-user"></i>
                    <div class="menu-per ">
                        <li ><p style="font-size:70%">{{auth()->user()->name}}</p></li>
                        <li ><a id="perfi" href="">Perfil</a></li>
                        <li >
                            <form  action="{{ route('logout') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">cerrar sesión</button>
                            </form>
                        </li>
                    </div>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="sec-central">
        <div id="app">
            <section class ="menu-left bg-dark">
                <div class="m-opcion">
                    <a id="op-a" href="{{route('inventario')}}">Inventario</a>
                </div>
                <div class="m-opcion">
                    <a id="op-a" href="{{route('home')}}">Rebaje</a>
                </div>
                <div class="m-opcion">
                    <a id="op-a" href="">Graficos</a>
                </div>
                <div class="m-opcion">
                    <a id="op-a" href="">Ventas</a>
                </div>
            </section>
            <section class = "cont-rigth">
                @yield('content')
            </section>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="{{asset('js/vue01.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>