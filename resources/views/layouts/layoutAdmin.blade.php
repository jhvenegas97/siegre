<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        $(document).ready(function() {

            $('ul li a').click(function() {
                $('ul li.active').removeClass('active');
                $(this).closest('li').addClass('active');
            });

        });
    </script>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SIEGRE - @yield('title')</title>
</head>

<body>

<header>

    <!--MENU-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 1.2rem;">
        <div class="container-fluid">

            <a class="navbar-brand" href="/init">
                <img src="images/logo-header.png" alt="Logo">
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
                                <a class="nav-link" aria-current="page" href="{{ route('login') }}"><i class="fa fa-user-plus"></i> {{ __('Iniciar sesión') }}</a>
                            </li>

                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user-plus"></i>{{ __('Cerrar sesión') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-file"></i> Manual de Usuario</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-users"></i> Acerca de</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!--FIN  MENU-->

</header>

<!--MENU NAVEGACION-->
<div class="container-fluid mt-3 mb-3">

    <div class="container-fluid row d-flex align-items-center m-0">
        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6 pb-3">
            <div class="row d-flex align-items-center flex-sm-column flex-xs-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row">
                <div class="col-lg-2 d-flex align-items-center justify-content-center">
                    <div class="row flex-column d-flex justify-content-center">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <img src="images/admin.png" width="70" height="70" class="img-responsive" alt="">
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h6 class="menu-nav text-center"> {{ Auth::user()->name }}</h6>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 d-flex align-items-center gap-2 justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start justify-content-md-center justify-content-sm-center justify-content-xs-center">
                    <a href="/siegre-templates"><img class="shadow-personalized" src="images/hogar.png " width="40 " height="40 " class="img-responsive " alt=" "></a>
                    <a href="#"><img class="shadow-personalized" src="images/usuario1.png " width="40 " height="40 " class="img-responsive " alt=" "></a>
                    <a href="#"><img class="shadow-personalized" src="images/entretenimientomenu.png " width="40 " height="40 " class="img-responsive " alt=" "></a>
                    <a href="#"><img class="shadow-personalized" src="images/consulta.png " width="40 " height="40 " class="img-responsive " alt=" "></a>
                </div>
            </div>

        </div>
        <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end justify-content-xl-end justify-content-xxl-end justify-content-sm-center justify-content-xs-center justify-content-md-center">
            <ul class="pagination shadow-lg">
                <li class="page-item "><a class="page-link" href="/init"><i class="fa fa-home mr-1 ml-0"></i> <small> Inicio</small> </a></li>
                <li class="page-item active"><a class="page-link" href="#"><i class="fa fa-users mr-1 ml-0"></i><small> Admin</small></a></li>
            </ul>
        </div>
    </div>

</div>
<!--FIN MENU NAVEGACION-->

@yield('content')

<!--FOOTER-->

<footer class="footer mt-auto py-3 bg-light d-flex flex-wrap align-items-center justify-content-center" style="font-size: 1.05rem; ">

    <div class="col-md-8 col-sm-12 d-flex align-items-center justify-content-center justify-content-md-start justify-content-lg-start justify-content-xl-start text-center text-md-start text-lg-start text-xl-start ">
        <span class="justify-content-sm-center d-flex " style="padding-left: 30px; padding-right: 30px; ">SIEGRES<br>© Copyright Universidad de Nariño. All Rights Reserved 2021 <br> Calle 18 Carrera 50 Torobajo, Bloque 3, Departamento de Matemáticas y Estadística</span>
    </div>

    <div class="col-md-4 col-sm-12 d-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end ">
        <ul class="nav list-unstyled " style=" font-size: 3rem; padding-right: 30px; padding-left: 30px; ">
            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://www.facebook.com/groups/81959732158/ " style="color: #05555C; "><i class="fa fa-facebook "></i></a>
            </li>

            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://www.youtube.com/playlist?list=PLlubJrAflG-ZRf1JPZacaUapk7PH4fGBz " style="color: #05555C; "><i class="fa fa-youtube "></i></a>
            </li>

            <li class="ms-3 ">
                <a class="nav-item " target="_blank " href="https://twitter.com/licinfoudenar " style="color: #05555C; "><i class="fa fa-twitter "></i></a>
            </li>
        </ul>
    </div>

</footer>
<!--FIN FOOTER-->

</body>

</html>
