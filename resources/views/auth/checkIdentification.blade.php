@extends('layouts.layoutInit')
@section('title','Validar Identificación')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4 mb-4 ms-4 me-4">
            <div class="col-lg-4 col-md-8 col-12">
                <form action="{{ url('checkIdentificationPost')  }}" method="post">
                    <div class="mb-3">
                        <label for="inputIdentificacion" class="form-label">Documento de Identificación</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control" id="identificacionText" name="identificationField" aria-describedby="Identificación">
                        <div id="emailHelp" class="form-text">Por favor ingrese su documento de identidad.</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-new">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
