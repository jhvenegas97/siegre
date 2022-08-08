@extends('layouts.layoutAdmin')
@section('title','Reportes del Sistema')

@section('content')
<div class="container">
    <div class="row justify-content-center p-4">

    <div class="grey-bg container">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Panel de Reportes del Sistema</h4>
                </div>
            </div>
            <div class="row">
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('jobs-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-briefcase fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Cargos Laborales por Usuario</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('last-job-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-person-walking-luggage fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Último Cargo Laboral por Usuario</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('last-login-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center align-bottom">
                                            <i class="fa-solid fa-right-to-bracket fa-3x"></i>
                                        </div>
                                        <div class="media-body text-right ms-3">
                                            <h4 class="danger">Último Inicio Sesión por Usuario</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('working-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-person-digging fa-3x"></i>
                                        </div>
                                        <div class="media-body text-right ms-3">
                                            <h4 class="danger">Usuarios Trabajando Actualmente</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            <div class="row mt-3">
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('college-degree-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-graduation-cap fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Títulos Académicos por Usuario</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('gender-employability-user')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-venus-mars fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Empleabilidad por Género</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </section>
    </div>

</div>
</div>
@endsection
