@extends('layouts.layoutClient')
@section('title', 'Publicaciones')
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <style>
        .hide-publication {
            opacity: 60% !important;
        }

        .fa-ellipsis:hover {
            color: #0CBCCC !important;
            cursor: pointer !important;
        }

        .fa-ellipsis:hover {
            color: #0CBCCC !important;
        }

        /* Style The Dropdown Button */
        .dropbtn {}

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <script>
        $(function() {
            $(document).on("click", "#pagination a, #search_btn", function(e) {
                e.preventDefault();
                //get url and make final url for ajax 
                var url = $(this).attr("href");
                var append = url.indexOf("?") == -1 ? "?" : "&";
                var finalURL = url + append + $("#searchform").serialize();

                //set to current url
                window.history.pushState({}, null, finalURL);

                $.ajax({
                    url: finalURL,
                    type: 'GET',
                    success: function(data) {
                        $("#pagination_data").html(data);
                    },
                    error: function(data) {

                    }
                });

                return false;
            })

        });
    </script>

    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script>
        /* // Enable pusher logging - don't include this in production
                  Pusher.logToConsole = true;

                  var pusher = new Pusher('5160c6d4988ca5c7c74d', {
                    cluster: 'us2'
                  });

                  var channel = pusher.subscribe('my-channel');
                  channel.bind('App\\Events\\PublicationEvent', function(data) {
                    alert(JSON.stringify(data));
                  }); */
    </script>

    <script>
        var notificationsWrapper = $('.dropdown-notifications');
        var notificationsToggle = notificationsWrapper.find('a[data-bs-toggle]');
        var notificationsCountElem = notificationsToggle.find('span[data-count]');
        var notificationsCount = parseInt(notificationsCountElem.data('count'));
        var notifications = notificationsWrapper.find('ul.dropdown-menu');

        //   if (notificationsCount <= 0) {
        //     notificationsWrapper.hide();
        //   }

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('5160c6d4988ca5c7c74d', {
            cluster: 'us2'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('my-channel');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\PublicationEvent', function(data) {
            var getUrl = window.location;
            var baseUrl = getUrl.origin + "/publication?id=" + data.publication.id;
            console.log(baseUrl);
            var existingNotifications = notifications.html();
            var newNotificationHtml = `
        <li><a class="dropdown-item" href="` + baseUrl + `" target="_blank">
            <div class="media">
<img src="/images/admin.svg" width="30%" alt="User Avatar" class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h5 class="dropdown-item-title">
    ` + data.user.name + `
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h5>
<p class="text-sm">` + data.publication.title_publication + `</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ` + moment(data.created_at).fromNow() + `</p>
</div>
</div>
</a></li>
        `;

            notifications.html(newNotificationHtml + existingNotifications);

            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            //notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();
        });
    </script>

    <div class="container pt-4">
        <div id="search">
            <form id="searchform" name="searchform">
                <div class="row">
                    <h4 class="text-center">Filtrar Publicaciones</h4>
                </div>
                <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Filtrar por Título" name="title_publication"
                                value="{{ request()->get('title_publication', '') }}" class="form-control" />
                            @csrf
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" id="category_publication_id_input" name="category_publication_id"
                                value="{{ request()->get('category_publication_id', '') }}" class="form-control" />
                            <select id="inputStateCategoryPublication" class="form-control">
                                <option value="">Elegir Categoría</option>
                                @foreach ($categoryPublications as $categoryPublication)
                                    <option value="{{ $categoryPublication->id }}">
                                        {{ $categoryPublication->name_category_publication }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex justify-content-center">
                        <a class='btn btn-new' href='{{ url('feed') }}' id='search_btn'>Buscar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--CUERPO-->
    <div class="container ps-5 pe-5 ">
        <div class="row row-cols-1 g-4 d-flex justify-content-center">
            <div class="col col-md-8">
                <div class="card">
                    <div
                        class="row mt-2 mb-2 d-flex align-items-center flex-sm-column flex-xs-column flex-md-column flex-lg-row flex-xl-row flex-xxl-row">
                        <div class="col-lg-2 d-flex align-items-center justify-content-center">
                            <div class="row flex-column d-flex justify-content-center">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->avatar != null)
                                        <img src="{{ Auth::user()->avatar }}" width="35" height="35"
                                            class="img-responsive img-circle" alt="">
                                    @else
                                        @if (Auth::user()->fileName != null)
                                            <img src="{{ asset('uploads/profilephotos/' . Auth::user()->fileName) }}" width="35"
                                                height="35" class="img-responsive img-circle" alt="">
                                        @else
                                            <img src="{{ asset('images/admin.svg') }}" width="35" height="35"
                                                class="img-responsive img-circle" alt="">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-10 d-flex align-items-center justify-content-center justify-content-lg-start justify-content-xl-start justify-content-xxl-start justify-content-md-center justify-content-sm-center justify-content-xs-center">
                            <button id="addNewPublication" class="btn btn-primary btn-new m-2" type="button">¿Deseas
                                realizar una publicación?</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN CUERPO-->

    <div class="container ps-5 pe-5 ">
        <div class="row row-cols-1 g-4 d-flex justify-content-center">
            <div class="col col-md-8">
                <div id="pagination_data">
                    @include('client.feedPagination', ['publications' => $publications])
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="modal" id="ajax-publication-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12  d-flex justify-content-center">
                            <h5 class="modal-title" id="ajaxPublicationModel">Crear Nueva Publicación</h5>
                        </div>
                    </div>

                    <div class="d-grid gap-2 ps-4 pe-4 mt-2">
                        <form method="POST" action="javascript:void(0)" id="addEditPublicationForm"
                            name="addEditPublicationForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3">
                                <input id="title_PublicationID" type="text" class="form-control" name="title_publication"
                                    value="" required autocomplete="title_publication" autofocus
                                    placeholder="Título de la Publicación">
                                <span style="display: none;" class="invalid-feedback" id="title_publication_error_span"
                                    role="alert">
                                    <strong id="title_publication_error"></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <input id="text_PublicationID" type="text" class="form-control"
                                    name="text_publication" value="" required autocomplete="text_publication"
                                    autofocus placeholder="Descripción de la Publicación">
                                <span style="display: none;" class="invalid-feedback" id="text_publication_error_span"
                                    role="alert">
                                    <strong id="text_publication_error"></strong>
                                </span>
                            </div>
                            <div class="mb-3 flex-column">
                                <label for="state"
                                    class="col-12 col-form-label text-md-start">{{ __('Categoría') }}</label>
                                <select id="inputCategory" class="form-control" required>
                                    <option data-id="" value="">Elegir</option>
                                    @foreach ($categoryPublications as $categoryPublication)
                                        <option data-id="{{ $categoryPublication->id }}">
                                            {{ $categoryPublication->name_category_publication }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha de Inicio') }}</label>
                                <input id="init_date_publicationID" type="date" class="form-control"
                                    name="init_date_publication" value="" required
                                    autocomplete="init_date_publication" autofocus>
                                <span style="display: none;" class="invalid-feedback" id="init_date_error_span"
                                    role="alert">
                                    <strong id="init_date_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Fecha Finalización') }}</label>
                                <input id="end_date_publicationID" type="date" class="form-control"
                                    name="end_date_publication" value="" required
                                    autocomplete="end_date_publication" autofocus>
                                <span style="display: none;" class="invalid-feedback" id="end_date_error_span"
                                    role="alert">
                                    <strong id="end_date_error"></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="title"
                                    class="col-12 col-form-label text-md-start">{{ __('Imagen Adjunta') }}</label>
                                <input class="form-control form-control-sm" id="titleFileSm" name="file_publication"
                                    type="file" accept="image/,.jpg,.jpeg,.png,.gif" value="null">
                            </div>

                            <div class="d-grid gap-2">
                                <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                                    <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                    <div class="d-grid gap-2 m-2">
                                        <a href="" style="text-decoration: none">
                                            <div class="d-grid gap-2 pt-2">
                                                <button type="submit" id="btn-save" value="addNewAcademicLevel"
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

    <!--FIN CUERPO-->

    <script type="text/javascript">
        $('#inputStateCategoryPublication').on('change', function() {
            $('#category_publication_id_input').val(this.value);
        });

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

            $('#addNewPublication').click(function(e) {
                e.preventDefault();
                $('#addEditPublicationForm').trigger("reset");
                $('#id').val('');
                $('#inputCategory').find('option').prop("selected", false);
                $('#ajaxPublicationModel').html("Crear Nueva Publicación");
                $('#ajax-publication-model').modal('show');
            });

            $('body').on('click', '.edit', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('edit-publication') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#ajaxPublicationModel').html("Editar Publicación");
                        $('#ajax-publication-model').modal('show');
                        $('#id').val(res.id);
                        $('#user_id').val(res.user_id);
                        $('#title_PublicationID').val(res.title_publication);
                        $('#text_PublicationID').val(res.text_publication);
                        $('#inputCategory option[data-id="' + res.category_publication_id +
                            '"]').prop('selected', 'selected');
                        $('#init_date_publicationID').val(res.init_date_publication);
                        $('#end_date_publicationID').val(res.end_date_publication);
                    }
                });
            });
            $('body').on('click', '.delete', function(e) {
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
                    confirmButtonText: 'Si, borrar publicación!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');

                        // ajax
                        $.ajax({
                            type: "POST",
                            url: "{{ url('delete-publication') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(res) {
                                $.ajax({
                                    url: "{{ url('feed') }}",
                                    type: 'GET',
                                    success: function(data) {
                                        $("#pagination_data").html(data);
                                    },
                                    error: function(data) {

                                    }
                                });
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Borrado completado'
                                })
                            }
                        });
                    }
                })
            });
            $('body').on('click', '.hide', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var hidden = $("#pubHidden"+id).val() == "0" ? 0 : 1;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('hide-publication') }}",
                    data: {
                        id: id,
                        hidden: hidden
                    },
                    dataType: 'json',
                    success: function(res) {
                        //console.log(res.hidden);
                        if (res.hidden == "1") {
                            $("#pub" + id).addClass('hide-publication');
                            $("#pubHidden"+id).val("0");
                            Toast.fire({
                                icon: 'success',
                                title: 'Se ocultó con éxito'
                            })
                        } else {
                            $("#pub" + id).removeClass('hide-publication');
                            $("#pubHidden"+id).val("1");
                            Toast.fire({
                                icon: 'success',
                                title: 'Se desocultó con éxito'
                            })
                        }
                    },
                    error: function(response){
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
            $('#addEditPublicationForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                formData.append('category_publication_id', $('#inputCategory option:selected').attr(
                    'data-id'));
                $.ajax({
                    type: 'POST',
                    url: "{{ url('add-update-publication') }}",
                    cache: false,
                    dataType: false,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: (response) => {
                        $('#addEditPublicationForm').trigger("reset");
                        $('#ajax-publication-model').modal('hide');

                        if (response) {
                            $.ajax({
                                url: "{{ url('feed') }}",
                                type: 'GET',
                                success: function(data) {
                                    $("#pagination_data").html(data);
                                },
                                error: function(response) {
                                    var dataErrors = Object.entries(response
                                        .responseJSON.errors);
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

                            if ($("#ajaxPublicationModel").text() == "Editar Publicación") {
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
@endsection
