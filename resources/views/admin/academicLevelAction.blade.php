@can('academic-level-edit')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Editar" class="edit"><button class="btn btn-primary btn-new mb-2">Editar</button></a>
@endcan
@can('academic-level-delete')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Eliminar" class="delete"><button class="btn btn-primary btn-new mb-2" >Eliminar</button></a>    
@endcan