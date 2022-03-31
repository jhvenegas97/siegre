@extends('layouts.layoutInit')
@section('title','Publicaciones')
@section('content')
    <script>
        $(document).ready(function() {

            $('ul li a').click(function() {
                $('ul li.active').removeClass('active');
                $(this).closest('li').addClass('active');
            });

        });
    </script>

    <!--MENU NAVEGACION-->
    <div class="container-fluid mt-3 mb-3">

        <div class="container-fluid row d-flex align-items-center m-0">
            <div class="col-xs-4 col-sm-6 col-md-6 col-lg-6 pb-3">
                <div class="row d-flex align-items-center flex-sm-column flex-xs-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row">
                    <div class="col-lg-2 d-flex align-items-center justify-content-center">
                        <div class="row flex-column d-flex justify-content-center">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <img src="{{ Auth::user()->avatar }}" width="70" height="70" class="img-responsive img-circle" alt="">
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h6 class="menu-nav text-center">{{ Auth::user()->name }}</h6>
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
                    <li class="page-item "><a class="page-link" href="index.html"><i class="fa fa-home mr-1 ml-0"></i> <small> Inicio</small> </a></li>
                    <li class="page-item active"><a class="page-link" href="#"><i class="fa fa-users mr-1 ml-0"></i><small> Admin</small></a></li>
                </ul>
            </div>
        </div>

    </div>
    <!--FIN MENU NAVEGACION-->

    <!--CUERPO-->
    <div class="container ps-5 pe-5 ">
        <div class="row row-cols-1 g-4 d-flex justify-content-center">
            @foreach($publicaciones as $key => $publicacion)
                <article class="col col-md-8">
                    <div class="card">
                        <img src="/uploads/publications/{{$publicacion->fileName_publication}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$publicacion->title_publication}}</h5>
                            <h6 class="card-title d-flex justify-content-end text-muted">{{$publicacion->category->name_category_publication}}</h6>
                            <p class="card-text">{{$publicacion->text_publication}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted">{{$publicacion->init_date_publication}}</small>
                            </div>
                            <div class="col-12 mt-2">
                                <img src="{{$publicacion->user->avatar}}" width="35" height="35" class="img-responsive img-circle" alt="">
                                <small class="text-muted">{{$publicacion->user->name}}</small>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach




        </div>
    </div>
    <!--FIN CUERPO-->

    <br>
    <br>

@endsection
