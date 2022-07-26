@foreach ($publications as $key => $publication)
    <article class="col pt-4">
        <div class="card">
            <img src="/uploads/publications/{{ $publication->fileName_publication }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-start row">
                    <div class="col-10">
                        <h5 class="card-title">{{ $publication->title_publication }}</h5>
                    </div>
                    <div class="d-flex justify-content-end col-2">
                        @if(Auth::user()->id == $publication->user_id)
                        <div class="dropdown">
                            <i class="dropbtn fa-solid fa-ellipsis fa-2x"></i>
                            <div class="dropdown-content">
                                <a href="" class="edit" data-id="{{$publication->id}}">Editar <i class="dropbtn fa-solid fa-trash-can fa-1x"></i></a>
                                <a href="" class="delete" data-id="{{$publication->id}}">Eliminar <i class="dropbtn fa-solid fa-pen-to-square fa-1x"></i></a>
                                <a href="#">Ocultar <i class="dropbtn fa-solid fa-eye-slash fa-1x"></i></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <h6 class="card-title d-flex justify-content-end text-muted">
                    {{ $publication->category->name_category_publication }}</h6>
                <p class="card-text">{{ $publication->text_publication }}</p>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <small class="text-muted">{{ $publication->init_date_publication }}</small>
                    </div>
                    <div class="col-12 mt-2">
                        @if (Auth::user()->avatar != null)
                            <img src="{{ $publication->user->avatar }}" width="35" height="35"
                                class="img-responsive img-circle" alt="">
                        @else
                            <img src="{{ asset('images/admin.svg') }}" width="35" height="35"
                                class="img-responsive img-circle" alt="">
                        @endif
                        <small class="text-muted">{{ $publication->user->name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endforeach
