@section('title', 'Administrador Roles y Permisos')
@extends('layouts.layoutAdmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Administración de Roles</h3>
            </div>
            <div class="row d-flex justify-content-start flex-column flex-md-row">
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                    <div class="col-12 d-flex justify-content-center justify-content-md-start">
                        <div class="pull-right">
                            @can('role-create')
                            <a class="btn btn-primary btn-new" href="{{ route('roles.create') }}"> Crear Nuevo Rol</a>
                            @endcan
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="align-middle text-center">No</th>
                    <th scope="col" class="align-middle text-center">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-new mb-2 fw-bold" href="{{ route('roles.show',$role->id) }}">Ver</a>
                    @can('role-edit')
                    <a class="btn btn-primary btn-new mb-2" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                    @endcan
                    @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-new mb-2 fw-bold']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $roles->render() !!}

</div>

@endsection
