@can('user-edit')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Editar" class="edit"><button class="btn btn-primary btn-new mb-2">Editar</button></a>    
@endcan
@can('user-delete')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Eliminar" class="delete"><button class="btn btn-primary btn-new mb-2" >Eliminar</button></a>    
@endcan
@can('assign-role')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Asignar Rol" class="assignRole"><button class="btn btn-primary btn-new mb-2" >Asignar Rol</button></a>    
@endcan
@can('change-state')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Cambiar Estado" class="state"><button class="btn btn-primary btn-new mb-2" >Cambiar Estado</button></a>    
@endcan