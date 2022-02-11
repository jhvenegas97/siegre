@section('title', 'Administrador Programas')
@extends('layouts.layoutAdmin')
@section('content')
     <div class="container-fluid">
        <center>
            <h3 class="mb-4">Lista de Programas</h3>
        </center>
        <div class="row d-flex justify-content-center flex-column flex-md-row">
            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                <div class="col-6 d-flex justify-content-center justify-content-md-start">
                    <button type="submit" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#programCreate">Crear Programa</button>
                </div>

            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center justify-content-md-end">
                        <button type="submit" class="btn btn-primary btn-new">Buscar</button>
                    </div>
                    <div class="col-8">
                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Buscar">
                    </div>
                </div>
            </div>

        </div>

        <!--INICIO TABLA-->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead class="table-light">
                <tr>
                    <th scope="col" class="align-middle text-center">No</th>
                    <th scope="col" class="align-middle text-center">Nombre</th>
                    <th scope="col" class="align-middle text-center">Facultad</th>

                    <th scope="col">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($programs as $key => $program)
                    <tr>
                        <th scope="row" class="align-middle text-center">{{$key+1}}</th>
                        <td class="align-middle text-center">{{$program->name_program}}</td>
                        <td class="align-middle text-center">{{$program->faculty}}</td>

                        <td>
                            <button type="submit" class="btn btn-primary btn-new mb-2">Editar</button>
                            <button type="button" class="btn btn-primary btn-new mb-2" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--FIN TABLA-->
        <br>
        <br>
        <br>
    </div>



     <div class="modal fade" id="programCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row d-flex justify-content-center">
                         <div class="col-12  d-flex justify-content-center">
                             <h5 class="modal-title" id="exampleModalLabel">Crear Programa</h5>
                         </div>
                     </div>

                     <div class="d-grid gap-2 ps-4 pe-4 mt-2">
                         <form method="POST" action="{{route('programStore')}}">
                             @csrf
                             <div class="mb-3">
                                 <input id="name_programID" type="text" class="form-control @error('name_program') is-invalid @enderror" name="name_program" value="{{ old('name_program') }}" required autocomplete="name_program" autofocus placeholder="Nombre del Programa">
                                 @error('name_program')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <input id="name_facultyID" type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" value="{{ old('faculty') }}" required autocomplete="faculty" autofocus placeholder="Facultad">
                                 @error('faculty')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>

                             <div class="d-grid gap-2">
                                 <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                                     <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                     <div class="d-grid gap-2 m-2">
                                         <a href="" style="text-decoration: none">
                                             <div class="d-grid gap-2 pt-2">
                                                 <button type="submit" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#registro">Crear</button>
                                             </div>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

    <!--FIN CUERPO-->
@endsection
