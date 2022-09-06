@extends('layouts.layoutAdmin')
@section('title','Panel General')

@section('content')
<div class="container">
    <div class="row justify-content-center p-4">

    <div class="grey-bg container">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Panel de Administración General</h4>
                    <p>Funciones principales y administración.</p>
                </div>
            </div>
            <div class="row">
                @can('user-list','user-create','user-edit','user-delete')
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
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('publication-admin-list','publication-admin-create','publication-admin-edit','publication-admin-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('publications')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-laptop-code fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Posts Admin</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('program-list','program-create','program-edit','program-delete')
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
                                            <h4 class="danger">Programas</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('faculty-list','faculty-create','faculty-edit','faculty-delete')
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
                                            <h4 class="danger">Facultades</h4>
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
                @can('academic-level-list','academic-level-create','academic-level-edit','academic-level-delete')
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
                                            <h4 class="danger">Niv. Académicos</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('work-type-list','work-type-create','work-type-edit','work-type-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('work-type')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-book-open-reader fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Tipos de Trabajo</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('role-list','role-create','role-edit','role-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('roles.index')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-user-shield fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Roles</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('permission-list','permission-create','permission-edit','permission-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('permissions.index')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-user-lock fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Permisos</h4>
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
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('feed')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-comment-dots fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Posts Cliente</h4>
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
                            <a href="{{route('list-curriculum')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-id-card fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Hojas de Vida</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                @can('reports-system')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('reports')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-clipboard-check fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Reportes</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan

                @can('gender-list','gender-create','gender-edit','gender-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('gender')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-venus-mars fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Géneros</h4>
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
                @can('category-publication-list','category-publication-create','category-publication-edit','category-publication-delete')
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{route('category-publication')}}" class="card-panel">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-address-book fa-3x"></i>
                                        </div>
                                        <div class="media-body text-left ms-3">
                                            <h4 class="danger">Categorías Publicaciones</h4>
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
                                    </div>
                                    <div class="align-self-center">
                                        <h1>{{$total_publications}}</h1>
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
