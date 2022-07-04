@extends('layouts.layoutInit')
@section('title', 'Hojas de Vida')
@section('content')
    <script>
        $(function() {
            $(document).on("click", "#pagination a,#search_btn", function() {

                //get url and make final url for ajax 
                var url = $(this).attr("href");
                var append = url.indexOf("?") == -1 ? "?" : "&";
                var finalURL = url + append + $("#searchform").serialize();

                //set to current url
                window.history.pushState({}, null, finalURL);

                $.get(finalURL, function(data) {

                    $("#pagination_data").html(data);

                });

                return false;
            })

        });
    </script>

    <div class="container pt-4">
        <div id="search">
            <form id="searchform" name="searchform">
                <div class="row"><h4 class="text-center">Filtrar Hojas de Vida</h4></div>
                <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Filtrar por Nombre" name="name" value="{{ request()->get('name', '') }}" class="form-control" />
                            @csrf
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" id="academic_level_id_input" name="academic_level_id" value="{{ request()->get('academic_level_id', '') }}"
                                class="form-control"/>
                            <select id="inputStateAcademicLevel" class="form-control">
                                <option value="">Elegir Nivel Académico</option>
                                @foreach ($academicLevels as $academicLevel)
                                    <option value="{{ $academicLevel->id }}">{{ $academicLevel->name_academic_level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex justify-content-center">
                        <a class='btn btn-new' href='{{ url('list-curriculum') }}' id='search_btn'>Buscar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--CUERPO-->
    <div class="container" id="pagination_data">
        @include('client.listCurriculumPagination', ['usersCurriculum' => $usersCurriculum])
    </div>
    <!--FIN CUERPO-->
    <script>
        $('#inputStateAcademicLevel').on('change', function() {
            $('#academic_level_id_input').val(this.value);
            console.log($('#academic_level_id_input').val())
        });
    </script>
    <br>
    <br>
@endsection
