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
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-5">
                                        <div class="card">
                                            <div class="card-header text-center">{{ __('Datos Personales') }}</div>

                                            <div class="card-body me-2 ms-2">
                                                <form id="userData" method="POST" action="{{ route('store-admin') }}"
                                                    enctype="multipart/form-data" onSubmit="return false;">
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-group form-check">
                                                            {{ Form::checkbox('showCurriculum', true, ['class' => 'form-check-input']) }}
                                                            <label class="form-check-label" for="showCurriculum">Mostrar
                                                                Hoja de Vida</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="row mb-3 flex-column">
                                                        <label for="name"
                                                            class="col-12 col-form-label text-md-star">{{ __('Nombre') }}</label>

                                                        <div class="col-12">
                                                            <input id="name" type="text" class="form-control"
                                                                name="name" value="" required autocomplete="name"
                                                                autofocus>

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
                                                            <input id="description" type="text" class="form-control"
                                                                name="description" value="" autocomplete="description"
                                                                autofocus>

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
                                                            <input id="phone" type="text" class="form-control"
                                                                name="phone" value="" autocomplete="phone"
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
                                                            <input id="email" type="email" class="form-control"
                                                                name="email" value="" required autocomplete="email">

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
                                                                value="" required
                                                                autocomplete="new-identification-id">

                                                            <span style="display: none;" class="invalid-feedback"
                                                                id="identification_id_error_span" role="alert">
                                                                <strong id="identification_id_error"></strong>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 flex-column">
                                                        <label for="name"
                                                            class="col-12 col-form-label text-md-star">{{ __('Nueva Contraseña') }}</label>

                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-11">
                                                                    <input id="password" type="password"
                                                                        class="form-control" name="password" required
                                                                        autocomplete="password"
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
                                                                    <input id="password_confirmation" type="password"
                                                                        class="form-control" name="password_confirmation"
                                                                        required autocomplete="password_confirmation"
                                                                        placeholder="Contraseña *">
                                                                </div>
                                                                <div class="col-1 d-flex align-items-center ps-0">
                                                                    <i class="fa-solid fa-eye-slash"
                                                                        id="togglePasswordConfirmation"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 flex-column">
                                                        <label for="gender"
                                                            class="col-12 col-form-label text-md-start">{{ __('Género') }}</label>
                                                        <select id="inputGender" class="form-control" required>
                                                            <option data-id="" value="">Elegir</option>
                                                            @foreach ($genders as $gender)
                                                                <option data-id="{{ $gender->id }}">{{ $gender->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    @can('change-state')
                                                        <div class="mb-3 flex-column">
                                                            <label for="state"
                                                                class="col-12 col-form-label text-md-start">{{ __('Estado') }}</label>
                                                            <select id="inputState" class="form-control" required>
                                                                <option data-id="" value="">Elegir</option>
                                                                <option data-id="1">Activo</option>
                                                                <option data-id="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    @endcan

                                                    @can('assign-role')
                                                        <div class="mb-3 flex-column">
                                                            <label for="role"
                                                                class="col-12 col-form-label text-md-start">{{ __('Rol') }}</label>
                                                            <select id="inputRole" class="form-control" required>
                                                                <option data-id="" value="">Elegir</option>
                                                                @foreach ($roles as $role)
                                                                    <option data-id="{{ $role->id }}">{{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endcan

                                                    <div class="mb-3 flex-column">
                                                        <label for="program"
                                                            class="col-12 col-form-label text-md-start">{{ __('Programa') }}</label>
                                                        <select id="inputProgram" class="form-control">
                                                            <option data-id="" value="">Elegir</option>
                                                            @foreach ($programs as $program)
                                                                <option data-id="{{ $program->id }}">
                                                                    {{ $program->name_program }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 flex-column">
                                                        <label for="avatar"
                                                            class="col-12 col-form-label text-md-start">{{ __('Avatar') }}</label>
                                                        <div class="col-12 d-flex align-items-center justify-content-star">
                                                            <img src="{{ asset('images/admin.svg') }}" width="70"
                                                                height="70" class="img-responsive img-circle"
                                                                alt="">
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
                                                            <input id="directionAutocomplete" type="text"
                                                                class="form-control" name="direction">
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
                                                            <button type="submit" class="btn btn-primary btn-new">
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
                                                <button type="submit" id="btn-save" value="addNewWork"
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

    <script type="text/javascript">
        7
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
                    url: "{{ url('store-admin') }}",
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
                            window.location.href = "/user";
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        $("#name_error_span").show();
                        $("#email_error_span").show();
                        $("#identification_id_error_span").show();
                        $("#direction_error_span").show();

                        try {
                            $("#name_error").text(response.responseJSON.errors.name);
                            $("#email_error").text(response.responseJSON.errors.email);
                            $("#identification_id_error").text(response.responseJSON.errors
                                .identification_id);
                            $("#direction_error").text(response.responseJSON.errors.direction);
                        } catch (exp) {}
                        if (response.status == 500) {
                            //console.log(response);
                            const swalWithBootstrapButtonsError = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success btn-new-success-sweet-alert',
                                    cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                                },
                                buttonsStyling: false
                            })
                            swalWithBootstrapButtonsError.fire(
                                'Cancelled', response.responseJSON.errorInfo[2], 'error'
                            )
                        }
                    }
                });
            });

        });
    </script>
@endsection
