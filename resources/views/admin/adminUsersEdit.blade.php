@section('title', 'Administrador Usuarios')
@extends('layouts.layoutAdmin')
@section('content')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="container mt-3 mb-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos
                                            Personales</span></strong></h3>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Datos Personales</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Contraseña</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-md-8 col-lg-6 col-xl-5">
                                                <div class="card">
                                                    <div class="card-header text-center">{{ __('Editar Datos Personales') }}
                                                    </div>

                                                    <div class="card-body me-2 ms-2">
                                                        <form id="userData" method="POST"
                                                            action="{{ route('store-user') }}" enctype="multipart/form-data"
                                                            onSubmit="return false;">
                                                            <div class="d-flex justify-content-end">
                                                                <div class="form-group form-check">
                                                                    {{ Form::checkbox('showCurriculum', $user->showCurriculum, $user->showCurriculum == 1 ? true : false, ['class' => 'form-check-input']) }}
                                                                    <label class="form-check-label"
                                                                        for="showCurriculum">Mostrar
                                                                        Hoja de
                                                                        Vida</label>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id" id="id"
                                                                value="{{ $user->id }}">
                                                            <div class="row mb-3 flex-column">
                                                                <label for="name"
                                                                    class="col-12 col-form-label text-md-star">{{ __('Nombre') }}</label>

                                                                <div class="col-12">
                                                                    <input id="name" type="text"
                                                                        class="form-control" name="name"
                                                                        value="{{ $user->name }}" required
                                                                        autocomplete="name" autofocus>

                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="name_error_span" role="alert">
                                                                        <strong id="name_error"></strong>
                                                                    </span>

                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 flex-column">
                                                                <label for="description"
                                                                    class="col-12 col-form-label text-md-star">{{ __('Descripción') }}</label>

                                                                <div class="col-12">
                                                                    <input id="description" type="text"
                                                                        class="form-control" name="description"
                                                                        value="{{ $user->description }}"
                                                                        autocomplete="description" autofocus>

                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="description_error_span" role="alert">
                                                                        <strong id="description_error"></strong>
                                                                    </span>

                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 flex-column">
                                                                <label for="phone"
                                                                    class="col-12 col-form-label text-md-star">{{ __('Teléfono') }}</label>

                                                                <div class="col-12">
                                                                    <input id="phone" type="text"
                                                                        class="form-control" name="phone"
                                                                        value="{{ $user->phone }}" autocomplete="phone"
                                                                        autofocus>

                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="phone_error_span" role="alert">
                                                                        <strong id="phone_error"></strong>
                                                                    </span>

                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 flex-column">
                                                                <label for="email"
                                                                    class="col-12 col-form-label text-md-start">{{ __('E-Mail') }}</label>

                                                                <div class="col-12">
                                                                    <input id="email" type="email"
                                                                        class="form-control" name="email"
                                                                        value="{{ $user->email }}" required
                                                                        autocomplete="email">

                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="email_error_span" role="alert">
                                                                        <strong id="email_error"></strong>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 flex-column">
                                                                <label for="identification-id"
                                                                    class="col-12 col-form-label text-md-start">{{ __('Documento de Identificación') }}</label>

                                                                <div class="col-12">
                                                                    <input id="identification_id" type="text"
                                                                        class="form-control" name="identification_id"
                                                                        value="{{ $user->identification_id }}" required
                                                                        autocomplete="new-identification-id" disabled>

                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="identification_id_error_span" role="alert">
                                                                        <strong id="identification_id_error"></strong>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 flex-column">
                                                                <label for="gender"
                                                                    class="col-12 col-form-label text-md-start">{{ __('Género') }}</label>
                                                                <select id="inputGender" class="form-control" required>
                                                                    <option data-id="" value="">Elegir</option>
                                                                    @foreach ($genders as $gender)
                                                                        @if ($user->gender_id == $gender->id)
                                                                            <option selected
                                                                                data-id="{{ $gender->id }}">
                                                                                {{ $gender->name }}</option>
                                                                        @else
                                                                            <option data-id="{{ $gender->id }}">
                                                                                {{ $gender->name }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 flex-column">
                                                                <label for="program"
                                                                    class="col-12 col-form-label text-md-start">{{ __('Programa') }}</label>
                                                                <select id="inputProgram" class="form-control">
                                                                    <option data-id="" value="">Elegir</option>
                                                                    @foreach ($programs as $program)
                                                                        @if ($user->program_id == $program->id)
                                                                            <option selected
                                                                                data-id="{{ $program->id }}">
                                                                                {{ $program->name_program }}</option>
                                                                        @else
                                                                            <option data-id="{{ $program->id }}">
                                                                                {{ $program->name_program }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 flex-column">
                                                                <label for="avatar"
                                                                    class="col-12 col-form-label text-md-start">{{ __('Avatar') }}</label>
                                                                <div
                                                                    class="col-12 d-flex align-items-center justify-content-star">
                                                                    @if ($user->avatar != null)
                                                                        <img src="{{ $user->avatar }}" width="70"
                                                                            height="70"
                                                                            class="img-responsive img-circle"
                                                                            alt="">
                                                                    @else
                                                                        @if ($user->fileName != null)
                                                                            <img src="{{ asset('uploads/' . $user->fileName) }}"
                                                                                width="70" height="70"
                                                                                class="img-responsive img-circle"
                                                                                alt="">
                                                                        @else
                                                                            <img src="{{ asset('images/admin.svg') }}"
                                                                                width="70" height="70"
                                                                                class="img-responsive img-circle"
                                                                                alt="">
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input class="form-control form-control-sm mt-3"
                                                                        id="avatarFileSm" name="file" type="file"
                                                                        accept=".jpg,.gif,.png" value="null">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 flex-column">
                                                                <div class="form-group">
                                                                    <label for="direction"
                                                                        class="col-12 col-form-label text-md-start">{{ __('Dirección') }}</label>
                                                                    @if ($user->direction != null)
                                                                        <input id="directionAutocomplete" type="text"
                                                                            class="form-control" name="direction"
                                                                            value="{{ $user->direction }}">
                                                                        {{-- <input type="text" name="direction" id="directionAutocomplete" class="form-control" placeholder="Elegir dirección" value="{{$user->direction}}"> --}}
                                                                    @else
                                                                        <input id="directionAutocomplete" type="text"
                                                                            class="form-control" name="direction">
                                                                        {{-- <input type="text" name="direction" id="directionAutocomplete" class="form-control" placeholder="Elegir dirección"> --}}
                                                                    @endif
                                                                    <span style="display: none;" class="invalid-feedback"
                                                                        id="direction_error_span" role="alert">
                                                                        <strong id="direction_error"></strong>
                                                                    </span>
                                                                </div>

                                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                                                <script type="text/javascript"
                                                                    src="https://maps.google.com/maps/api/js?key=AIzaSyCiaHmECkGA_grBFw8c4i6srLRmBWbxAi4&libraries=places"></script>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $("#latitudeArea").addClass("d-none");
                                                                        $("#longtitudeArea").addClass("d-none");
                                                                    });
                                                                </script>
                                                                <script>
                                                                    google.maps.event.addDomListener(window, 'load', initialize);

                                                                    function initialize() {
                                                                        var input = document.getElementById('directionAutocomplete');
                                                                        var autocomplete = new google.maps.places.Autocomplete(input);

                                                                        autocomplete.addListener('place_changed', function() {
                                                                            var place = autocomplete.getPlace();
                                                                            /*$('#latitude').val(place.geometry['location'].lat());
                                                                                                                                                                                                            $('#longitude').val(place.geometry['location'].lng());
                                                                                                                                        
                                                                                                                                                                                                            $("#latitudeArea").removeClass("d-none");
                                                                                                                                                                                                            $("#longtitudeArea").removeClass("d-none");*/
                                                                        });
                                                                    }
                                                                </script>
                                                            </div>


                                                            <div class="row mb-0">
                                                                <div class="col-md-6">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-new">
                                                                        {{ __('Guardar') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-md-8 col-lg-6 col-xl-5">
                                                <div class="card">
                                                    <div class="card-header text-center">{{ __('Editar Contraseña') }}
                                                    </div>

                                                    @can('change-password')
                                                        <div class="card-body me-2 ms-2">
                                                            <form id="userPassword" method="POST"
                                                                action="{{ route('update-password') }}"
                                                                enctype="multipart/form-data" onSubmit="return false;">
                                                                <input type="hidden" name="id" id="id-user"
                                                                    value="{{ $user->id }}">
                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Contraseña Actual') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="oldpassword" type="password"
                                                                                    class="form-control" name="oldpassword"
                                                                                    required autocomplete="oldpassword"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="toggleOldPassword"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Nueva Contraseña') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="password" type="password"
                                                                                    class="form-control" name="password"
                                                                                    required autocomplete="password"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="togglePassword"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Confirmar Contraseña') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="password_confirmation"
                                                                                    type="password" class="form-control"
                                                                                    name="password_confirmation" required
                                                                                    autocomplete="password_confirmation"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="togglePasswordConfirmation"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-0">
                                                                    <div class="col-md-6">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-new">
                                                                            {{ __('Guardar') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endcan

                                                    @can('change-password-admin')
                                                        <div class="card-header text-center">
                                                            {{ __('Editar Contraseña Todos los Usuarios') }}
                                                        </div>
                                                        <div class="card-body me-2 ms-2">
                                                            <form id="userPasswordAdmin" method="POST"
                                                                action="{{ route('update-password-admin') }}"
                                                                enctype="multipart/form-data" onSubmit="return false;">
                                                                <input type="hidden" name="id" id="id-user"
                                                                    value="{{ $user->id }}">
                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Contraseña Administrador') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="oldpassword" type="password"
                                                                                    class="form-control" name="oldpassword"
                                                                                    required autocomplete="oldpassword"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="toggleOldPassword"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Nueva Contraseña') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="password" type="password"
                                                                                    class="form-control" name="password"
                                                                                    required autocomplete="password"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="togglePassword"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3 flex-column">
                                                                    <label for="name"
                                                                        class="col-12 col-form-label text-md-star">{{ __('Confirmar Contraseña') }}</label>

                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-11">
                                                                                <input id="password_confirmation"
                                                                                    type="password" class="form-control"
                                                                                    name="password_confirmation" required
                                                                                    autocomplete="password_confirmation"
                                                                                    placeholder="Contraseña *">
                                                                            </div>
                                                                            <div class="col-1 d-flex align-items-center ps-0">
                                                                                <i class="fa-solid fa-eye-slash"
                                                                                    id="togglePasswordConfirmation"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-0">
                                                                    <div class="col-md-6">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-new">
                                                                            {{ __('Guardar') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos
                                            Académicos</span></strong></h3>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="row d-flex justify-content-start flex-column flex-md-row">
                                    <div
                                        class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                                        <div class="col-12 d-flex justify-content-center justify-content-md-start">
                                            <button id="addNewAcademic" class="btn btn-primary btn-new"
                                                data-bs-toggle="modal" data-bs-target="#facultyCreate">Crear Título
                                                Académico</button>
                                        </div>
                                    </div>

                                </div>

                                <!--INICIO TABLA-->
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width:100%" id="datatable-ajax-crud">

                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="align-middle text-center">No</th>
                                                <th scope="col" class="align-middle text-center">Tipo</th>
                                                <th scope="col" class="align-middle text-center">Nombre</th>
                                                <th scope="col" class="align-middle text-center">Fecha Inicio</th>
                                                <th scope="col" class="align-middle text-center">Fecha Fin</th>
                                                <th scope="col" class="align-middle text-center">Documento Soporte</th>

                                                <th scope="col">Acciones</th>
                                            </tr>
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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos
                                            Laborales</span></strong></h3>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="row d-flex justify-content-start flex-column flex-md-row">
                                    <div
                                        class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                                        <div class="col-12 d-flex justify-content-center justify-content-md-start">
                                            <button id="addNewWork" class="btn btn-primary btn-new"
                                                data-bs-toggle="modal" data-bs-target="#facultyCreate">Crear Experiencia
                                                Laboral</button>
                                        </div>
                                    </div>

                                </div>
                                <!--INICIO TABLA-->
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width:100%" id="datatable-ajax-crud-work">

                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="align-middle text-center">No</th>
                                                <th scope="col" class="align-middle text-center">Tipo</th>
                                                <th scope="col" class="align-middle text-center">Nombre</th>
                                                <th scope="col" class="align-middle text-center">Fecha Inicio</th>
                                                <th scope="col" class="align-middle text-center">Fecha Fin</th>
                                                <th scope="col" class="align-middle text-center">Documento Soporte</th>

                                                <th scope="col">Acciones</th>
                                            </tr>
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



        </div>
    </div>


    <div class="modal" id="ajax-academic-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12  d-flex justify-content-center">
                            <h5 class="modal-title" id="ajaxAcademicModel">Crear Título Académico</h5>
                        </div>
                    </div>

                    <div class="d-grid gap-2 ps-4 pe-4 mt-2">
                        <form method="POST" action="javascript:void(0)" id="addEditAcademicForm"
                            name="addEditAcademicForm">
                            @csrf
                            <input type="hidden" name="id" id="id-numeric">
                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Nivel Académico') }}</label>
                                <select id="inputStateAcademicLevel" class="form-control">
                                    <option data-id="">Elegir Nivel Académico</option>
                                    @foreach ($academicLevels as $academicLevel)
                                        <option data-id="{{ $academicLevel->id }}">
                                            {{ $academicLevel->name_academic_level }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Nombre Título Académico') }}</label>
                                <input id="name_academicID" type="text" class="form-control" name="title_academic"
                                    value="" required autocomplete="title_academic" autofocus
                                    placeholder="Ingrese el Nombre del Título">
                                <span style="display: none;" class="invalid-feedback" id="name_error_span"
                                    role="alert">
                                    <strong id="name_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha de Inicio') }}</label>
                                <input id="init_date_academicID" type="date" class="form-control"
                                    name="init_date_academic" value="" required autocomplete="init_date_academic"
                                    autofocus>
                                <span style="display: none;" class="invalid-feedback" id="init_date_error_span"
                                    role="alert">
                                    <strong id="init_date_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha Finalización') }}</label>
                                <input id="end_date_academicID" type="date" class="form-control"
                                    name="end_date_academic" value="" required autocomplete="end_date_academic"
                                    autofocus>
                                <span style="display: none;" class="invalid-feedback" id="end_date_error_span"
                                    role="alert">
                                    <strong id="end_date_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Documento Soporte') }}</label>
                                <input class="form-control form-control-sm" id="titleFileSm" name="file_academic"
                                    type="file" accept=".pdf" value="null">
                            </div>

                            <div class="d-grid gap-2">
                                <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                                    <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                    <div class="d-grid gap-2 m-2">
                                        <a href="" style="text-decoration: none">
                                            <div class="d-grid gap-2 pt-2">
                                                <button type="submit" id="btn-save" value="addNewAcademic"
                                                    class="btn btn-primary btn-new">Guardar</button>
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

    <div class="modal" id="ajax-work-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12  d-flex justify-content-center">
                            <h5 class="modal-title" id="ajaxWorkModel">Crear Experiencia Laboral</h5>
                        </div>
                    </div>

                    <div class="d-grid gap-2 ps-4 pe-4 mt-2">
                        <form method="POST" action="javascript:void(0)" id="addEditWorkForm" name="addEditWorkForm">
                            @csrf
                            <input type="hidden" name="id" id="id-numeric-work">
                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Tipo de Trabajo') }}</label>
                                <select id="inputStateWorkLevel" class="form-control">
                                    <option data-id="">Elegir Tipo de Trabajo</option>
                                    @foreach ($workTypes as $workType)
                                        <option data-id="{{ $workType->id }}">{{ $workType->name_work_type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Nombre Experiencia Laboral') }}</label>
                                <input id="name_workID" type="text" class="form-control" name="title_work"
                                    value="" required autocomplete="title_work" autofocus
                                    placeholder="Ingrese el Nombre de la Experiencia Laboral">
                                <span style="display: none;" class="invalid-feedback" id="name_work_error_span"
                                    role="alert">
                                    <strong id="name_work_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha de Inicio') }}</label>
                                <input id="init_date_workID" type="date" class="form-control" name="init_date_work"
                                    value="" required autocomplete="init_date_academic" autofocus>
                                <span style="display: none;" class="invalid-feedback" id="init_date_work_error_span"
                                    role="alert">
                                    <strong id="init_date_work_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha Finalización') }}</label>
                                <input id="end_date_workID" type="date" class="form-control" name="end_date_work"
                                    value="" autocomplete="end_date_work" autofocus>
                                <span style="display: none;" class="invalid-feedback" id="end_date_work_error_span"
                                    role="alert">
                                    <strong id="end_date_work_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Documento Soporte') }}</label>
                                <input class="form-control form-control-sm" id="titleFileWorkSm" name="file_work"
                                    type="file" accept=".pdf" value="null">
                            </div>

                            <div class="d-grid gap-2">
                                <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                                    <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                    <div class="d-grid gap-2 m-2">
                                        <a href="" style="text-decoration: none">
                                            <div class="d-grid gap-2 pt-2">
                                                <button type="submit" id="btn-save-work" value="addNewWork"
                                                    class="btn btn-primary btn-new">Guardar</button>
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

    <style>
        form i {
            cursor: pointer;
        }
    </style>

    <script type="text/javascript">
        const oldpassword = document.querySelector('#oldpassword');
        const toggleOldPassword = document.querySelector('#toggleOldPassword');
        toggleOldPassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = oldpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            oldpassword.setAttribute('type', type);
            // toggle the eye / eye slash icon
            if (type == "password") {
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });

        const password = document.querySelector('#password');
        const togglePassword = document.querySelector('#togglePassword');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            if (type == "password") {
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });

        const password_confirmation = document.querySelector('#password_confirmation');
        const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
        togglePasswordConfirmation.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password_confirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            password_confirmation.setAttribute('type', type);
            // toggle the eye / eye slash icon
            if (type == "password") {
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });

        function cleanErrors() {
            $("#name_error_span").hide();
            $("#name_error").text("");
            $("#init_date_error_span").hide();
            $("#init_date_error").text("");
            $("#end_date_error_span").hide();
            $("#end_date_error").text("");
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var spanishLanguage = {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %ds fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "renameState": "Cambiar nombre",
                    "updateState": "Actualizar"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de",
                            "notContains": "No Contiene",
                            "notStarts": "No empieza con",
                            "notEnds": "No termina con"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d",
                    "showMessage": "Mostrar Todo",
                    "collapseMessage": "Colapsar Todo"
                },
                "select": {
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "%d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    },
                    "rows": {
                        "1": "1 fila seleccionada",
                        "_": "%d filas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "AM", "PM"
                    ],
                    "months": {
                        "0": "Enero",
                        "1": "Febrero",
                        "10": "Noviembre",
                        "11": "Diciembre",
                        "2": "Marzo",
                        "3": "Abril",
                        "4": "Mayo",
                        "5": "Junio",
                        "6": "Julio",
                        "7": "Agosto",
                        "8": "Septiembre",
                        "9": "Octubre"
                    },
                    "weekdays": [
                        "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "stateRestore": {
                    "creationModal": {
                        "button": "Crear",
                        "name": "Nombre:",
                        "order": "Clasificación",
                        "paging": "Paginación",
                        "search": "Busqueda",
                        "select": "Seleccionar"
                    },
                    "emptyError": "El nombre no puede estar vacio",
                    "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                    "removeError": "Error al eliminar el registro",
                    "removeJoiner": "y",
                    "removeSubmit": "Eliminar",
                    "renameButton": "Cambiar Nombre",
                    "renameLabel": "Nuevo nombre para %s"
                }
            };

            $('#datatable-ajax-crud').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('academic') }}",
                    data: {
                        id: $("#userData").find('input[name="id"]').val()
                    }
                },
                columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                }, {
                    data: 'name_academic_level',
                    name: 'name_academic_level'
                }, {
                    data: 'title_academic',
                    name: 'title_academic'
                }, {
                    data: 'init_date_academic',
                    name: 'init_date_academic'
                }, {
                    data: 'end_date_academic',
                    name: 'end_date_academic'
                }, {
                    data: 'fileName_academic',
                    name: 'fileName_academic',
                    fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                        if (oData.fileName_academic) {
                            $(nTd).html("<a target='_blank' href='/uploads/academics/" + oData
                                .fileName_academic + "'>" +
                                "<i class='fa-solid fa-file-pdf fa-2x'>" + "</i>" + "</a>");
                        }
                    }
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }, ],
                order: [
                    [0, 'desc']
                ],
                language: spanishLanguage,
            });

            $('#addNewAcademic').click(function(e) {
                e.preventDefault();
                cleanErrors();
                $('#addEditAcademicForm').trigger("reset");
                $('#id-numeric').val('');
                $('#inputStateAcademicLevel').find('option').prop("selected", false);
                $('#ajaxAcademicModel').html("Crear Título Académico");
                $('#ajax-academic-model').modal('show');
            });

            $('body').on('click', '.editAcademic', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                cleanErrors();
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('edit-academic') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        $('#ajaxAcademicModel').html("Editar Nivel Académico");
                        $('#id-numeric').val(res.id);
                        $('#name_academicID').val(res.title_academic);
                        $('#inputStateAcademicLevel option[data-id="' + res.academic_level_id +
                            '"]').attr('selected', 'selected');
                        $('#init_date_academicID').val(res.init_date_academic);
                        $('#end_date_academicID').val(res.end_date_academic);
                        $('#ajax-academic-model').modal('show');
                    }
                });
            });
            $('body').on('click', '.deleteAcademic', function(e) {
                e.preventDefault();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success btn-new-success-sweet-alert',
                        cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Estas seguro?',
                    text: "Estos cambios no se pueden revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, borrar nivel académico!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');

                        // ajax
                        $.ajax({
                            type: "POST",
                            url: "{{ url('delete-academic') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(res) {
                                var oTable = $('#datatable-ajax-crud').dataTable();
                                oTable.fnDraw(false);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Borrado completado'
                                })
                            }
                        });
                    }
                })
            });

            $('#addEditAcademicForm').submit(function(e) {
                e.preventDefault();
                cleanErrors();
                let formData = new FormData(this);
                var data = $('#titleFileSm').value;
                formData.append('academic_level_id', $('#inputStateAcademicLevel option:selected').prop(
                    'data-id'));
                formData.append('user_id', $("#userData").find('input[name="id"]').val());
                $.ajax({
                    type: 'POST',
                    url: "{{ url('add-update-academic') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        $('#addEditAcademicForm').trigger("reset");
                        $('#ajax-academic-model').modal('hide');
                        var oTable = $('#datatable-ajax-crud').dataTable();
                        oTable.fnDraw(false);
                        if (response) {
                            if ($("#ajaxAcademicModel").text() == "Editar Nivel Académico") {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Datos modificados con éxito'
                                })
                            } else {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Datos guardados con éxito'
                                })
                            }
                        }
                    },
                    error: function(response) {
                        var dataErrors = Object.entries(response.responseJSON.errors);
                        dataErrors.forEach(element => {
                            element.slice(1).forEach(entry => {
                                Toastify({
                                    text: entry,
                                    duration: 3000,
                                    gravity: "bottom",
                                    style: {
                                        background: "linear-gradient(to right, #ED360D, #96c93d)",
                                    },
                                }).showToast();
                            });
                        });
                    }
                });
            });


        });
    </script>

    <script type="text/javascript">
        function cleanErrors() {
            $("#name_work_error_span").hide();
            $("#name_work_error").text("");
            $("#init_date_work_error_span").hide();
            $("#init_date_work_error").text("");
            $("#end_date_work_error_span").hide();
            $("#end_date_work_error").text("");
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var spanishLanguage = {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %ds fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "renameState": "Cambiar nombre",
                    "updateState": "Actualizar"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de",
                            "notContains": "No Contiene",
                            "notStarts": "No empieza con",
                            "notEnds": "No termina con"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d",
                    "showMessage": "Mostrar Todo",
                    "collapseMessage": "Colapsar Todo"
                },
                "select": {
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "%d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    },
                    "rows": {
                        "1": "1 fila seleccionada",
                        "_": "%d filas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "AM", "PM"
                    ],
                    "months": {
                        "0": "Enero",
                        "1": "Febrero",
                        "10": "Noviembre",
                        "11": "Diciembre",
                        "2": "Marzo",
                        "3": "Abril",
                        "4": "Mayo",
                        "5": "Junio",
                        "6": "Julio",
                        "7": "Agosto",
                        "8": "Septiembre",
                        "9": "Octubre"
                    },
                    "weekdays": [
                        "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "stateRestore": {
                    "creationModal": {
                        "button": "Crear",
                        "name": "Nombre:",
                        "order": "Clasificación",
                        "paging": "Paginación",
                        "search": "Busqueda",
                        "select": "Seleccionar"
                    },
                    "emptyError": "El nombre no puede estar vacio",
                    "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                    "removeError": "Error al eliminar el registro",
                    "removeJoiner": "y",
                    "removeSubmit": "Eliminar",
                    "renameButton": "Cambiar Nombre",
                    "renameLabel": "Nuevo nombre para %s"
                }
            };

            $('#datatable-ajax-crud-work').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('work') }}",
                    data: {
                        id: $("#userData").find('input[name="id"]').val()
                    }
                },
                columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                }, {
                    data: 'name_work_type',
                    name: 'name_work_type'
                }, {
                    data: 'title_work',
                    name: 'title_work'
                }, {
                    data: 'init_date_work',
                    name: 'init_date_work'
                }, {
                    data: 'end_date_work',
                    name: 'end_date_work'
                }, {
                    data: 'fileName_work',
                    name: 'fileName_work',
                    fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                        if (oData.fileName_work) {
                            $(nTd).html("<a target='_blank' href='/uploads/works/" + oData
                                .fileName_work + "'>" +
                                "<i class='fa-solid fa-file-pdf fa-2x'>" + "</i>" + "</a>");
                        }
                    }
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }, ],
                order: [
                    [0, 'desc']
                ],
                language: spanishLanguage,
            });

            $('#addNewWork').click(function(e) {
                e.preventDefault();
                cleanErrors();
                $('#addEditWorkForm').trigger("reset");
                $('#id-numeric-work').val('');
                $('#inputStateWorkLevel').find('option').prop("selected", false);
                $('#ajaxWorkModel').html("Crear Experiencia Laboral");
                $('#ajax-work-model').modal('show');
            });

            $('body').on('click', '.editWork', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                cleanErrors();
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('edit-work') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        $('#ajaxWorkModel').html("Editar Experiencia Laboral");
                        $('#id-numeric-work').val(res.id);
                        $('#name_workID').val(res.title_work);
                        $('#inputStateWorkLevel option[data-id="' + res.work_type_id + '"]')
                            .prop('selected', 'selected');
                        $('#init_date_workID').val(res.init_date_work);
                        $('#end_date_workID').val(res.end_date_work);
                        $('#ajax-work-model').modal('show');
                    }
                });
            });
            $('body').on('click', '.deleteWork', function(e) {
                e.preventDefault();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success btn-new-success-sweet-alert',
                        cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Estas seguro?',
                    text: "Estos cambios no se pueden revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, borrar nivel académico!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');
                        // ajax
                        $.ajax({
                            type: "POST",
                            url: "{{ url('delete-work') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(res) {
                                var oTable = $('#datatable-ajax-crud-work').dataTable();
                                oTable.fnDraw(false);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Borrado completado'
                                })
                            }
                        });
                    }
                })
            });

            $('#addEditWorkForm').submit(function(e) {
                e.preventDefault();
                cleanErrors();
                let formData = new FormData(this);
                var data = $('#titleFileWorkSm').value;
                formData.append('work_type_id', $('#inputStateWorkLevel option:selected').prop('data-id'));
                formData.append('user_id', $("#userData").find('input[name="id"]').val());
                $.ajax({
                    type: 'POST',
                    url: "{{ url('add-update-work') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        $('#addEditWorkForm').trigger("reset");
                        $('#ajax-work-model').modal('hide');
                        var oTable = $('#datatable-ajax-crud-work').dataTable();
                        oTable.fnDraw(false);
                        if (response) {
                            if ($("#ajaxWorkModel").text() == "Editar Experiencia Laboral") {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Datos modificados con éxito'
                                })
                            } else {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Datos guardados con éxito'
                                })
                            }
                        }
                    },
                    error: function(response) {
                        var dataErrors = Object.entries(response.responseJSON.errors);
                        dataErrors.forEach(element => {
                            element.slice(1).forEach(entry => {
                                Toastify({
                                    text: entry,
                                    duration: 3000,
                                    gravity: "bottom",
                                    style: {
                                        background: "linear-gradient(to right, #ED360D, #96c93d)",
                                    },
                                }).showToast();
                            });
                        });
                    }
                });
            });


        });
    </script>

    <script type="text/javascript">
        function cleanErrors() {
            $("#name_error_span").hide();
            $("#email_error_span").hide();
            $("#identification_id_error_span").hide();
            $("#direction_error_span").hide();
            $("#name_error").text("");
            $("#email_error").text("");
            $("#identification_id_error").text("");
            $("#direction_error").text("");
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#userData').submit(function(e) {
                e.preventDefault();
                cleanErrors();
                let formData = new FormData(this);
                var data = $('#avatarFileSm').value;
                formData.append('state', $('#inputState option:selected').prop('data-id'));
                formData.append('program_id', $('#inputProgram option:selected').prop('data-id'));
                formData.append('role_id', $('#inputRole option:selected').prop('data-id'));
                formData.append('gender_id', $('#inputGender option:selected').prop('data-id'));
                $.ajax({
                    type: 'POST',
                    url: "{{ url('add-update-user') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        if (response) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Datos guardados con éxito'
                            })
                        }
                    },
                    error: function(response) {
                        var dataErrors = Object.entries(response.responseJSON.errors);
                        dataErrors.forEach(element => {
                            element.slice(1).forEach(entry => {
                                Toastify({
                                    text: entry,
                                    duration: 3000,
                                    gravity: "bottom",
                                    style: {
                                        background: "linear-gradient(to right, #ED360D, #96c93d)",
                                    },
                                }).showToast();
                            });
                        });
                    }
                });
            });

            $('#userPassword').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('update-password') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        if (response) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Datos guardados con éxito'
                            })
                            $('#userPassword').trigger("reset");
                        }
                    },
                    error: function(response) {
                        var dataErrors = Object.entries(response.responseJSON.errors);
                        dataErrors.forEach(element => {
                            element.slice(1).forEach(entry => {
                                Toastify({
                                    text: entry,
                                    duration: 3000,
                                    gravity: "bottom",
                                    style: {
                                        background: "linear-gradient(to right, #ED360D, #96c93d)",
                                    },
                                }).showToast();
                            });
                        });
                    }
                });
            });

            $('#userPasswordAdmin').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('update-password-admin') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        if (response) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Datos guardados con éxito'
                            })
                            $('#userPasswordAdmin').trigger("reset");
                        }
                    },
                    error: function(response) {
                        var dataErrors = Object.entries(response.responseJSON.errors);
                        dataErrors.forEach(element => {
                            element.slice(1).forEach(entry => {
                                Toastify({
                                    text: entry,
                                    duration: 3000,
                                    gravity: "bottom",
                                    style: {
                                        background: "linear-gradient(to right, #ED360D, #96c93d)",
                                    },
                                }).showToast();
                            });
                        });
                    }
                });
            });


        });
    </script>
@endsection
