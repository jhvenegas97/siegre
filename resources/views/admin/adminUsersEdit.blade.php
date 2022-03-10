@section('title', 'Administrador Usuarios')
@extends('layouts.layoutAdmin')
@section('content')
<script>
    const Toast = Swal.mixin({
        toast: true
        , position: 'bottom-end'
        , showConfirmButton: false
        , timer: 3000
        , timerProgressBar: true
        , didOpen: (toast) => {
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Personales</span></strong></h3>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-5">
                                    <div class="card">
                                        <div class="card-header text-center">{{ __('Editar Datos Personales') }}</div>

                                        <div class="card-body me-2 ms-2">
                                            <form id="userData" method="POST" action="{{ route('store-user') }}" enctype="multipart/form-data" onSubmit="return false;">

                                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                                <div class="row mb-3 flex-column">
                                                    <label for="name" class="col-12 col-form-label text-md-star">{{ __('Nombre') }}</label>

                                                    <div class="col-12">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                                        <span style="display: none;" class="invalid-feedback" id="name_error_span" role="alert">
                                                            <strong id="name_error"></strong>
                                                        </span>

                                                    </div>
                                                </div>

                                                <div class="row mb-3 flex-column">
                                                    <label for="email" class="col-12 col-form-label text-md-start">{{ __('E-Mail') }}</label>

                                                    <div class="col-12">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">

                                                        <span style="display: none;" class="invalid-feedback" id="email_error_span" role="alert">
                                                            <strong id="email_error"></strong>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row mb-3 flex-column">
                                                    <label for="document-id" class="col-12 col-form-label text-md-start">{{ __('Documento de identificación') }}</label>

                                                    <div class="col-12">
                                                        <input id="identification_id" type="text" class="form-control" name="identification_id" value="{{$user->identification_id}}" required autocomplete="new-documento">

                                                        <span style="display: none;" class="invalid-feedback" id="identification_id_error_span" role="alert">
                                                            <strong id="identification_id_error"></strong>
                                                        </span>
                                                    </div>
                                                </div>


                                                <div class="mb-3 flex-column">
                                                    <label for="state" class="col-12 col-form-label text-md-start">{{ __('Estado') }}</label>
                                                    <select id="inputState" class="form-control" required>
                                                        <option data-id="" value="">Elegir</option>
                                                        @if($user->state==0)
                                                        <option data-id="1">Activo</option>
                                                        <option selected data-id="0">Inactivo</option>
                                                        @else
                                                        <option selected data-id="1">Activo</option>
                                                        <option data-id="0">Inactivo</option>
                                                        @endif

                                                    </select>
                                                </div>

                                                <div class="mb-3 flex-column">
                                                    <label for="program" class="col-12 col-form-label text-md-start">{{ __('Programa') }}</label>
                                                    <select id="inputProgram" class="form-control" required>
                                                        <option data-id="" value="">Elegir</option>
                                                        @foreach($programs as $program)
                                                        @if($user->program_id==$program->id)
                                                        <option selected data-id="{{$program->id}}">{{$program->name_program}}</option>
                                                        @else
                                                        <option data-id="{{$program->id}}">{{$program->name_program}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3 flex-column">
                                                    <label for="avatar" class="col-12 col-form-label text-md-start">{{ __('Avatar') }}</label>
                                                    <div class="col-12 d-flex align-items-center justify-content-star">
                                                        @if($user->avatar!=null)
                                                        <img src="{{$user->avatar}}" width="70" height="70" class="img-responsive img-circle" alt="">
                                                        @else
                                                        <img src="{{asset('uploads/'.$user->fileName)}}" width="70" height="70" class="img-responsive img-circle" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control form-control-sm mt-3" id="avatarFileSm" name="file" type="file" accept=".jpg,.gif,.png" value="null">
                                                    </div>
                                                </div>

                                                <div class="mb-3 flex-column">
                                                    <div class="form-group">
                                                        <label for="direction" class="col-12 col-form-label text-md-start">{{ __('Dirección') }}</label>
                                                        @if($user->direction!=null)
                                                        <input id="directionAutocomplete" type="text" class="form-control" name="direction" value="{{$user->direction}}" required>
                                                        {{-- <input type="text" name="direction" id="directionAutocomplete" class="form-control" placeholder="Elegir dirección" value="{{$user->direction}}"> --}}
                                                        @else
                                                        <input id="directionAutocomplete" type="text" class="form-control" name="direction" required>
                                                        {{-- <input type="text" name="direction" id="directionAutocomplete" class="form-control" placeholder="Elegir dirección"> --}}
                                                        @endif
                                                        <span style="display: none;" class="invalid-feedback" id="direction_error_span" role="alert">
                                                            <strong id="direction_error"></strong>
                                                        </span>
                                                    </div>

                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                                    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyB_YcsBPRa2i9bDIupg7wuCCRWlpEO1Ip8&libraries=places"></script>
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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Académicos</span></strong></h3>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            <h3 class="mb-0"><strong><span class="badge bg-secondary btn-new">Datos Académicos</span></strong></h3>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


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

        $('#addNewProgram').click(function(e) {
            e.preventDefault();
            cleanErrors();
            $('#addEditProgramForm').trigger("reset");
            $('#ajaxProgramModel').html("Crear programa");
            $('#ajax-program-model').modal('show');
        });

        $('body').on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            cleanErrors();
            // ajax
            $.ajax({
                type: "POST"
                , url: "{{ url('edit-program') }}"
                , data: {
                    id: id
                }
                , dataType: 'json'
                , success: function(res) {
                    $('#ajaxProgramModel').html("Editar Programa");
                    $('#ajax-program-model').modal('show');
                    $('#id').val(res.id);
                    $('#name_programID').val(res.name_program);
                    $('#inputState option[data-id="' + res.faculty_id + '"]').attr('selected', 'selected');
                }
            });
        });
        $('body').on('click', '.delete', function(e) {
            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success btn-new-success-sweet-alert'
                    , cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                }
                , buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Estas seguro?'
                , text: "Estos cambios no se pueden revertir!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Si, borrar el programa!'
                , cancelButtonText: 'No, cancelar!'
                , reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    //Swal.fire('Programa eliminado con éxito!', '', 'success')
                    var id = $(this).data('id');

                    // ajax
                    $.ajax({
                        type: "POST"
                        , url: "{{ url('delete-program') }}"
                        , data: {
                            id: id
                        }
                        , dataType: 'json'
                        , success: function(res) {
                            var oTable = $('#datatable-ajax-crud').dataTable();
                            oTable.fnDraw(false);
                            Toast.fire({
                                icon: 'success'
                                , title: 'Borrado completado'
                            })
                        }
                    });
                }
            })
        });
        $('body').on('click', '#btn-save', function(e) {
            e.preventDefault();
            var id = $("#id").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var document = $("#document").val();
            var state = $('#inputState option:selected').attr('data-id');
            var program = $('#inputProgram option:selected').attr('data-id');
            var direction = $("#directionAutocomplete").val();
            var file = $('#avatarFileSm').val();

            //cleanErrors();

            $("#btn-save").html('Por favor espera...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST"
                , url: "{{ url('add-update-user') }}"
                , data: {
                    id: id
                    , name: name
                    , email: email
                    , identification_id: document
                    , state: state
                    , program_id: program
                    , direction: direction
                , }
                , dataType: 'json'
                , success: function(response) {
                    console.log(response);
                    $("#ajax-program-model").modal('hide');
                    var oTable = $('#datatable-ajax-crud').dataTable();
                    oTable.fnDraw(false);
                    Toast.fire({
                        icon: 'success'
                        , title: 'El programa fue creado con éxito'
                    })
                    $("#btn-save").html('Guardar');
                    $("#btn-save").attr("disabled", false);
                }
                , error: function(response) {
                    $("#btn-save").html('Guardar');
                    $("#btn-save").attr("disabled", false);
                    $("#name_error_span").show();
                    $("#faculty_error_span").show();
                    try {
                        $("#name_error").text(response.responseJSON.errors.name_program);
                        $("#faculty_error").text(response.responseJSON.errors.faculty_id);
                    } catch (exp) {}
                    if (response.status == 500) {
                        console.log(response);
                        const swalWithBootstrapButtonsError = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success btn-new-success-sweet-alert'
                                , cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                            }
                            , buttonsStyling: false
                        })
                        swalWithBootstrapButtonsError.fire(
                            'Cancelled'
                            , response.responseJSON.errorInfo[2]
                            , 'error'
                        )
                    }
                }
            });
        });

        $('#userData').submit(function(e) {
            e.preventDefault();
            cleanErrors();
            let formData = new FormData(this);
            var data = $('#avatarFileSm').value;
            formData.append('state', $('#inputState option:selected').attr('data-id'));
            formData.append('program_id', $('#inputProgram option:selected').attr('data-id'));
            $.ajax({
                type: 'POST'
                , url: "{{ url('add-update-user') }}"
                , cache: false
                , dataType: false
                , processData: false
                , contentType: false
                , data: formData
                , success: (response) => {
                    if (response) {
                        Toast.fire({
                            icon: 'success'
                            , title: 'Datos guardados con éxito'
                        })
                    }
                }
                , error: function(response) {
                    console.log(response);
                    $("#name_error_span").show();
                    $("#email_error_span").show();
                    $("#identification_id_error_span").show();
                    $("#direction_error_span").show();

                    try {
                        $("#name_error").text(response.responseJSON.errors.name);
                        $("#email_error").text(response.responseJSON.errors.email);
                        $("#identification_id_error").text(response.responseJSON.errors.identification_id);
                        $("#direction_error").text(response.responseJSON.errors.direction);
                    } catch (exp) {}
                    if (response.status == 500) {
                        //console.log(response);
                        const swalWithBootstrapButtonsError = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success btn-new-success-sweet-alert'
                                , cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                            }
                            , buttonsStyling: false
                        })
                        swalWithBootstrapButtonsError.fire(
                            'Cancelled'
                            , response.responseJSON.errorInfo[2]
                            , 'error'
                        )
                    }
                }
            });
        });

    });

</script>
@endsection
