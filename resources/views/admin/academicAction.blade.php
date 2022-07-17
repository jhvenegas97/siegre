@can('academic-edit')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Editar" class="editAcademic"><button class="btn btn-primary btn-new mb-2">Editar</button></a>    
@endcan
@can('academic-delete')
<a href="javascript:void(0)" data-id="{{$id}}" data-original-title="Eliminar" class="deleteAcademic"><button class="btn btn-primary btn-new mb-2" >Eliminar</button></a>    
@endcan