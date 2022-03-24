@extends('layouts.layoutAdmin')
@section('title','Panel General')

@section('content')
<div class="container">
    <div class="row justify-content-center p-4">
        {{-- <div class="col-md-8">--}}
        {{-- <div class="card">--}}
        {{-- <div class="card-header">{{ __('Panel General') }}</div>--}}

    {{-- <div class="card-body">--}}
    {{-- @if (session('status'))--}}
    {{-- <div class="alert alert-success" role="alert">--}}
    {{-- {{ session('status') }}--}}
    {{-- </div>--}}
    {{-- @endif--}}

    {{-- {{ __('Has iniciado sesión!') }}--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}

    <div class="grey-bg container">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Panel de Administración General</h4>
                    <p>Funciones principales y administración.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-users fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Usuarios</h4>
                                            <span>Descripción corta</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('publish')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-laptop-code fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="success">Publicaciones</h4>
                                            <span>Descripción corta</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('program')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center align-bottom">
                                            <i class="fa-solid fa-graduation-cap fa-3x"></i>
                                        </div>
                                        <div class="media-body text-right ms-3">
                                            <h4>Programas</h4>
                                            <span>Descripción corta</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('faculty')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-building-columns fa-3x"></i>
                                        </div>
                                        <div class="media-body text-right ms-3">
                                            <h4>Facultades</h4>
                                            <span>Descripción corta</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('academic-level')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-book-open-reader fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Niveles Académicos</h4>
                                            <span>Descripción corta</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">--}}
            {{-- <div class="col-xl-3 col-sm-6 col-12">--}}
            {{-- <div class="card">--}}
            {{-- <div class="card-content">--}}
            {{-- <div class="card-body">--}}
            {{-- <div class="media d-flex">--}}
            {{-- <div class="media-body text-left">--}}
            {{-- <h3 class="primary">278</h3>--}}
            {{-- <span>New Posts</span>--}}
            {{-- </div>--}}
            {{-- <div class="align-self-center">--}}
            {{-- <i class="icon-book-open primary font-large-2 float-right"></i>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="progress mt-1 mb-0" style="height: 7px;">--}}
            {{-- <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="col-xl-3 col-sm-6 col-12">--}}
            {{-- <div class="card">--}}
            {{-- <div class="card-content">--}}
            {{-- <div class="card-body">--}}
            {{-- <div class="media d-flex">--}}
            {{-- <div class="media-body text-left">--}}
            {{-- <h3 class="warning">156</h3>--}}
            {{-- <span>New Comments</span>--}}
            {{-- </div>--}}
            {{-- <div class="align-self-center">--}}
            {{-- <i class="icon-bubbles warning font-large-2 float-right"></i>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="progress mt-1 mb-0" style="height: 7px;">--}}
            {{-- <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
        </section>

        <section id="stats-subtitle">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Estadísticas</h4>
                    <p>Estadísticas iniciales para administración.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Publicaciones</h4>
                                        <span>Publicaciones al mes</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>18,000</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="icon-speech warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Total Usuarios</h4>
                                        <span>Usarios nuevos al mes</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$total_users}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </section>
    </div>

</div>
</div>
@endsection
