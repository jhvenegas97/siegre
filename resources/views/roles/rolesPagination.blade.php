<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col" class="align-middle text-center">No</th>
                <th scope="col" class="align-middle text-center">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-new mb-2 fw-bold" href="{{ route('roles.show', $role->id) }}">Ver</a>
                    @can('role-edit')
                        <a class="btn btn-primary btn-new mb-2" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-new mb-2 fw-bold']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div id="pagination" class="d-flex justify-content-center mt-3">
    {{ $roles->links() }}
</div>
