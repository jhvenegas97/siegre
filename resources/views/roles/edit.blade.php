@section('title', 'Administrador - Editar Rol')
@extends('layouts.layoutAdmin')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Editar Rol</h3>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Algo salió mal, contacta a los administradores de SIEGRE.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="flex-column">
            <div class="form-group">
                <label for="state" class="col-12 col-form-label text-md-start">{{ __('Nombre') }}</label>
                {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="mb-3 flex-column">
            <label for="state" class="col-12 col-form-label text-md-start">{{ __('Permisos') }}</label>
            @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br />
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
            <a class="btn btn-primary btn-new" href="{{ route('roles.index') }}">Regresar</a>
            <button type="submit" class="btn btn-primary btn-new">Guardar cambios</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>


@endsection
