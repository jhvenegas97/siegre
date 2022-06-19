@section('title', 'Administrador - Ver Permiso')
@extends('layouts.layoutAdmin')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h3>Ver Permiso</h3>
        </div>
    </div>
</div>


<div class="row">
    <div class="mb-3 flex-column">
        <div class="form-group">
            <label for="state" class="col-12 col-form-label text-md-start"><strong>Nombre: </strong>{{ $permission->name }}</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
            <a class="btn btn-primary btn-new" href="{{ route('permissions.index') }}">Regresar</a>
        </div>
</div>
</div>
@endsection
