@can('work-edit')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Editar" class="editWork"><button class="btn btn-primary btn-new mb-2">Editar</button></a>    
@endcan
@can('work-delete')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Eliminar" class="deleteWork"><button class="btn btn-primary btn-new mb-2" >Eliminar</button></a>    
@endcan
