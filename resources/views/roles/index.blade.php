@section('title', 'Administrador Roles y Permisos')
@extends('layouts.layoutAdmin')

@section('content')
<script>
    $(function() {
        $(document).on("click", "#pagination a", function(e) {
            e.preventDefault();
            //get url and make final url for ajax 
            var url = $(this).attr("href");
            var append = url.indexOf("?") == -1 ? "?": "&";
            var finalURL = url + append;

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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Administración de Roles</h3>
            </div>
            <div class="row d-flex justify-content-start flex-column flex-md-row">
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-4">
                    <div class="col-12 d-flex justify-content-center justify-content-md-start">
                        <div class="pull-right">
                            @can('role-create')
                            <a class="btn btn-primary btn-new" href="{{ route('roles.create') }}"> Crear Nuevo Rol</a>
                            @endcan
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div id="pagination_data">
        @include('roles.rolesPagination', ['roles' => $roles])
    </div>

</div>

@endsection
