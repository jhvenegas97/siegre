<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="https://kit.fontawesome.com/369e4418c7.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $('ul li a').click(function() {
                $('ul li.active').removeClass('active');
                $(this).closest('li').addClass('active');
            });

        });
    </script>
    <title>SIEGRE - @yield('title')</title>
</head>

<body>

<header>

    <!--MENU-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 1.2rem;">
        <div class="container-fluid">

            <a class="navbar-brand" href="/">
                <img src="{{asset('images/logo_header.svg')}}" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('login') }}"><i class="fa fa-user-plus fa-sm"></i> {{ __('Iniciar sesión') }}</a>
                            </li>

                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user-plus fa-sm"></i> {{ __('Cerrar sesión') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('list-curriculum')}}"><i class="fa fa-id-card fa-sm"></i> Hojas de Vida</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{asset('files/manualUsuario.pdf')}}"><i class="fa fa-file fa-sm"></i> Manual de Usuario</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}"><i class="fa fa-users fa-sm"></i> Acerca de</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!--FIN  MENU-->

</header>

@yield('content')

<!--FOOTER-->

<footer class="footer mt-auto py-3 bg-light d-flex flex-wrap align-items-center justify-content-center" style="font-size: 1.05rem; ">

    <div class="col-md-8 col-sm-12 d-flex align-items-center justify-content-center justify-content-md-start justify-content-lg-start justify-content-xl-start text-center text-md-start text-lg-start text-xl-start ">
        <span class="justify-content-sm-center d-flex " style="padding-left: 30px; padding-right: 30px; ">SIEGRES<br>© Copyright Universidad de Nariño. All Rights Reserved 2022 <br> Calle 18 Carrera 50 Torobajo, Bloque 3, Departamento de Matemáticas y Estadística</span>
    </div>

    <div class="col-md-4 col-sm-12 d-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end ">
        <ul class="nav list-unstyled " style=" font-size: 3rem; padding-right: 30px; padding-left: 30px; ">
            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://www.facebook.com/groups/81959732158/ " style="color: #05555C; "><i class="fa fa-facebook fa-1x"></i></a>
            </li>

            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://www.youtube.com/playlist?list=PLlubJrAflG-ZRf1JPZacaUapk7PH4fGBz " style="color: #05555C; "><i class="fa fa-youtube fa-1x"></i></a>
            </li>

            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://twitter.com/licinfoudenar " style="color: #05555C; "><i class="fa fa-twitter fa-1x"></i></a>
            </li>
        </ul>
    </div>

</footer>
<!--FIN FOOTER-->

</body>

</html>
