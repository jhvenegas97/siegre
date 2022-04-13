@extends('layouts.layoutClient')
@section('title','Publicaciones')
@section('content')
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
