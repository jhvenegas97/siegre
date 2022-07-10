@extends('layouts.layoutInit')
@section('title','Hoja de Vida')
@section('content')

<!--CUERPO-->
<div class="container ps-5 pe-5 pt-4">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Personales</span></strong></h3>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="row d-flex justify-content-center">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <h4 class="text-center">{{$userCurriculum[0]->name}}</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <button class="btn btn-new show">
                                @if ($userCurriculum[0]->avatar != null)
                                    <img src="{{ $userCurriculum[0]->avatar }}" width="100" height="100"
                                        class="img-responsive img-circle" alt="">
                                @else
                                    @if ($userCurriculum[0]->fileName != null)
                                        <img src="{{ asset('uploads/' . $userCurriculum[0]->fileName) }}" width="100"
                                            height="100" class="img-responsive img-circle" alt="">
                                    @else
                                        <img src="{{ asset('images/admin.svg') }}" width="100" height="100"
                                            class="img-responsive img-circle" alt="">
                                    @endif
                                @endif
                            </button>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-2">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <p class="text-center">{{$userCurriculum[0]->description}}</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <p>{{$userCurriculum[0]->email}}</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-2">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <p>{{$userCurriculum[0]->phone}}</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="d-flex justify-content-center col-md-8 col-lg-6 col-xl-5">
                            <p>{{$userCurriculum[0]->direction}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Académicos</span></strong></h3>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <!--INICIO TABLA-->
                    <div class="table-responsive">
                        <table class="table table-hover" style="width:100%" id="datatable-ajax-crud">

                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="align-middle text-center">No</th>
                                    <th scope="col" class="align-middle text-center">Tipo</th>
                                    <th scope="col" class="align-middle text-center">Nombre</th>
                                    <th scope="col" class="align-middle text-center">Fecha Inicio</th>
                                    <th scope="col" class="align-middle text-center">Fecha Fin</th>
                                    <th scope="col" class="align-middle text-center">Documento Soporte</th>
                                </tr>
                                @foreach ($userCurriculum[1] as $key => $academic)
                                <tr>
                                    <td class="align-middle text-center">{{ ++$key }}</td>
                                    <td class="align-middle text-center">{{$academic->name_academic_level}}</td>
                                    <td class="align-middle text-center">{{$academic->title_academic}}</td>
                                    <td class="align-middle text-center">{{$academic->init_date_academic}}</td>
                                    <td class="align-middle text-center">{{$academic->end_date_academic}}</td>
                                    <td class="align-middle text-center"><a target='_blank' href='/uploads/academics/{{$academic->fileName_academic}}'> <i class='fa-solid fa-file-pdf fa-2x'></i></a></td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>

                    <!--FIN TABLA-->
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Laborales</span></strong></h3>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <!--INICIO TABLA-->
                    <div class="table-responsive">
                        <table class="table table-hover" style="width:100%" id="datatable-ajax-crud-work">

                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="align-middle text-center">No</th>
                                    <th scope="col" class="align-middle text-center">Tipo</th>
                                    <th scope="col" class="align-middle text-center">Nombre</th>
                                    <th scope="col" class="align-middle text-center">Fecha Inicio</th>
                                    <th scope="col" class="align-middle text-center">Fecha Fin</th>
                                    <th scope="col" class="align-middle text-center">Documento Soporte</th>
                                </tr>
                                @foreach ($userCurriculum[2] as $key => $work)
                                <tr>
                                    <td scope="row" class="align-middle text-center">{{ ++$key }}</td>
                                    <td scope="row" class="align-middle text-center">{{$work->name_work_type}}</td>
                                    <td scope="row" class="align-middle text-center">{{$work->title_work}}</td>
                                    <td scope="row" class="align-middle text-center">{{$work->init_date_work}}</td>
                                    <td scope="row" class="align-middle text-center">{{$work->end_date_work}}</td>
                                    <td scope="row" class="align-middle text-center"><a target='_blank' href='/uploads/works/{{$work->fileName_work}}'> <i class='fa-solid fa-file-pdf fa-2x'></i></a></td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>

                    <!--FIN TABLA-->
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN CUERPO-->

<br>
<br>
@endsection
