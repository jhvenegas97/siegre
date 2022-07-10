<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col" class="align-middle text-center">No</th>
                <th scope="col" class="align-middle text-center">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        @foreach ($permissions as $key => $permission)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <a class="btn btn-info btn-new mb-2 fw-bold"
                        href="{{ route('permissions.show', $permission->id) }}">Ver</a>
                    @can('permission-edit')
                        <a class="btn btn-primary btn-new mb-2"
                            href="{{ route('permissions.edit', $permission->id) }}">Editar</a>
                    @endcan
                    @can('permission-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-new mb-2 fw-bold']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div id="pagination" class="d-flex justify-content-center mt-3">
    {{ $permissions->links() }}
</div>