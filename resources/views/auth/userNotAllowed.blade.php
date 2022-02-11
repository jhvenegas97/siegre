@extends('layouts.layoutInit')
@section('title','Usuario no Permitido')
@section('content')
    <div class="container col-md-6 mt-5 mb-5">
        <div class="alert alert-danger text-center">
            <h2>¡Error!</h2> Usted no es egresado del Programa de Licenciatura en Informática
        </div>

        <div class="d-grid gap-2">
            <a href="{{route('welcome')}}" style="text-decoration: none">
                <div class="d-grid gap-2 pt-2">
                    <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#registro">Regresar al Inicio</button>
                </div>
            </a>
        </div>
    </div>
@endsection
