@section('title', 'Administrador Tipos de Trabajo')
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

    @if(session()->has('success'))

    @endif

     <div class="container-fluid">
        <center>
            <h3 class="mb-4">Lista de Tipos de Trabajo</h3>
        </center>
        <div class="row d-flex justify-content-start flex-column flex-md-row">
            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                @can('work-type-create')
                <div class="col-12 d-flex justify-content-center justify-content-md-start">
                    <button id="addNewWorkType" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#facultyCreate">Crear Tipo de Trabajo</button>
                </div>
                @endcan
            </div>

        </div>

        <!--INICIO TABLA-->
         <div class="table-responsive">
             <table class="table table-striped" style="width:100%" id="datatable-ajax-crud">

                 <thead class="table-light">
                 <tr>
                     <th scope="col" class="align-middle text-center">No</th>
                     <th scope="col" class="align-middle text-center">Nombre</th>

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



     <div class="modal" id="ajax-work-type-model" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row d-flex justify-content-center">
                         <div class="col-12  d-flex justify-content-center">
                             <h5 class="modal-title" id="ajaxWorkTypeModel">Crear Tipo de Trabajo</h5>
                         </div>
                     </div>

                     <div class="d-grid gap-2 ps-4 pe-4 mt-2">
                         <form method="POST" action="javascript:void(0)" id="addEditWorkTypeForm" name="addEditWorkTypeForm">
                             @csrf
                             <input type="hidden" name="id" id="id">
                             <div class="mb-3">
                                 <input id="name_workTypeID" type="text" class="form-control" name="name_work_type" value="" required autocomplete="name_work_type" autofocus placeholder="Nombre del Tipo de Trabajo">
                                 <span style="display: none;" class="invalid-feedback" id="name_error_span" role="alert">
                                        <strong id="name_error"></strong>
                                 </span>
                             </div>

                             <div class="d-grid gap-2">
                                 <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                                     <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                     <div class="d-grid gap-2 m-2">
                                         <a href="" style="text-decoration: none">
                                             <div class="d-grid gap-2 pt-2">
                                                 <button type="submit" id="btn-save" value="addNewWorkType" class="btn btn-primary btn-new">Guardar</button>
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
        function cleanErrors(){
            $("#name_error_span").hide();
            $("#name_error").text("");
        }

        $(document).ready(function(){
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
                        "AM",
                        "PM"
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
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sab"
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
                ajax: "{{ url('work-type') }}",
                columns: [
                    {data: 'id', name: 'id', 'visible': false},
                    { data: 'name_work_type', name: 'name_work_type' },
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']],
                language:spanishLanguage,
            });

            $('#addNewWorkType').click(function (e) {
                e.preventDefault();
                cleanErrors();
                $('#addEditWorkTypeForm').trigger("reset");
                $('#id').val('');
                console.log($('#id').val());
                $('#ajaxWorkTypeModel').html("Crear Tipo de Trabajo");
                $('#ajax-work-type-model').modal('show');
            });

            $('body').on('click', '.edit', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                cleanErrors();
                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('edit-work-type') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        $('#ajaxWorkTypeModel').html("Editar Tipo de Trabajo");
                        $('#ajax-work-type-model').modal('show');
                        $('#id').val(res.id);
                        $('#name_workTypeID').val(res.name_work_type);
                    }
                });
            });
            $('body').on('click', '.delete', function (e) {
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
                        //Swal.fire('Facultad eliminada con éxito!', '', 'success')
                        var id = $(this).data('id');

                        // ajax
                        $.ajax({
                            type:"POST",
                            url: "{{ url('delete-work-type') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){
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
            $('body').on('click', '#btn-save', function (e) {
                e.preventDefault();
                var id = $("#id").val();
                var name_work_type = $("#name_workTypeID").val();

                cleanErrors();

                $("#btn-save").html('Por favor espera...');
                $("#btn-save"). attr("disabled", true);

                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('add-update-work-type') }}",
                    data: {
                        id:id,
                        name_work_type:name_work_type,
                    },
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        $("#ajax-work-type-model").modal('hide');
                        var oTable = $('#datatable-ajax-crud').dataTable();
                        oTable.fnDraw(false);
                        Toast.fire({
                            icon: 'success',
                            title: 'El nivel académico fue creado con éxito'
                        })
                        $("#btn-save").html('Guardar');
                        $("#btn-save"). attr("disabled", false);
                    },
                    error: function(response){
                        console.log(response);
                        $("#btn-save").html('Guardar');
                        $("#btn-save"). attr("disabled", false);
                        $("#name_error_span").show();
                        try{
                            $("#name_error").text(response.responseJSON.errors.name_academic_level);
                        }
                        catch (exp){
                        }
                        if(response.status == 500){
                            console.log(response);
                            const swalWithBootstrapButtonsError = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success btn-new-success-sweet-alert',
                                    cancelButton: 'btn btn-danger btn-new-danger-sweet-alert'
                                },
                                buttonsStyling: false
                            })
                            swalWithBootstrapButtonsError.fire(
                                'Cancelled',
                                response.responseJSON.message,
                                'error'
                            )
                        }
                    }
                });
            });
        });
    </script>


@endsection
