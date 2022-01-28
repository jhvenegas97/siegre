@extends('layouts.layoutInit')
@section('title','Inicio sesión')
@section('content')
    <div class="container-fluid">
        <br>
        <h2 class="text-center">Selecciona un usuario</h2>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="row">

                    <div class="col-12 d-flex justify-content-center p-3">
                        <img src="images/admin.png" width="200" height="200" class="img-responsive" alt="">
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#administrador">ADMINISTRADOR</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center p-3">
                        <img src="images/docente.png" width="200" height="200" class="img-responsive" alt="">
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#gestor">GESTOR</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="row">

                    <div class="col-12 d-flex justify-content-center p-3">
                        <img src="images/egresado.png" width="200" height="200" class="img-responsive" alt="">
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#egresado">EGRESADO</button>
                    </div>
                </div>
            </div>


            <!--VENTANA EMERGENTE ADMINISTRADOR-->
            <div class="modal fade" id="administrador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12  d-flex justify-content-center">
                                    <img src="images/admin.png" width="80" height="80" class="img-responsive" alt="">
                                </div>
                                <div class="col-12  d-flex justify-content-center">
                                    <h5 class="modal-title" id="exampleModalLabel">Administrador</h5>
                                </div>
                            </div>

                            <div class="d-grid gap-2 m-3">
                                <button type="button" class="btn btn-primary btn-new">{{ __('Iniciar sesión con Google') }}</button>
                                <button type="button" class="btn btn-primary btn-new">{{ __('Iniciar sesión con Facebook') }}</button>
                            </div>
                            <div class="d-grid gap-2 ps-4 pe-4">
                                <form method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Identificación">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check d-flex flex-row gap-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">{{ __(' Recordar') }}</label>
                                        @if (Route::has('password.request'))
                                            <a class="text-end" href="{{ route('password.request') }}">
                                                {{ __('Olvidó su contraseña?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="d-grid gap-2 ps-3 pe-3 pb-3">
                                        <button type="submit" class="btn btn-primary btn-new">{{ __('Ingresar') }}</button>
                                    </div>
                                </form>
                            </div>

                            <div class="d-grid gap-2">
                                <div class="modal-footer" style="display: block !important;">
                                    <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                    <h6 class="text-center">¿Aún no tienes cuenta en SIEGRE?</h6>
                                    <div class="d-grid gap-2 pt-2">
                                        <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#registro">Registrarse</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--FIN VENTANA EMERGENTE ADMINISTRADOR-->

            <!--VENTANA EMERGENTE GESTOR-->
            <div class="modal fade" id="gestor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">

                                <div class="col-12  d-flex justify-content-center">
                                    <img src="images/docente.png" width="100" height="100" class="img-responsive" alt="">
                                </div>

                                <div class="col-12  d-flex justify-content-center">
                                    <h5 class="modal-title" id="exampleModalLabel">Gestor</h5>
                                </div>
                            </div>

                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Identificación</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Recordar</label>
                                    <br>
                                    <a href="https://es.stackoverflow.com" target="_blank" class="align-items-right">¿Olvidaste tu contraseña?</a>
                                </div>

                                <div class="modal-footer">
                                    <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                    <button type="submit" class="btn btn-primary btn-new">Ingresar</button>
                                    <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#registro">Registrarse</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--QUITO SE DAÑA FOOTER-->
        <!--FIN VENTANA EMERGENTE GESTOR-->

        <!--VENTANA EMERGENTE EGRESADO-->


        <div class="modal fade" id="egresado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">

                            <div class="col-12  d-flex justify-content-center">
                                <img src="images/egresado.png" width="100" height="100" class="img-responsive" alt="">
                            </div>

                            <div class="col-12  d-flex justify-content-center">
                                <h5 class="modal-title" id="exampleModalLabel">Egresado</h5>
                            </div>
                        </div>

                        <form>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Identificación</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Recordar</label>

                                <br>
                                <a href="https://es.stackoverflow.com" target="_blank" class="align-items-right">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="modal-footer">
                                <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                                <button type="submit" class="btn btn-primary btn-new">Ingresar</button>
                                <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal" data-bs-target="#registro">Registrarse</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--FIN VENTANA EMERGENTE-->

        <!--VENTANA EMERGENTE REGISTRO-->

        <!-- Modal -->
        <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">

                            <div class="col-12  d-flex justify-content-center">
                                <img src="images/icono1.png" width="100" height="100" class="img-responsive" alt="">
                            </div>

                            <div class="col-12  d-flex justify-content-center">
                                <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
                            </div>
                        </div>

                        <form>

                            <div class="mb-3 mt-4">
                                <div class="row d-flex justify-content-center">

                                    <div class="col-6 ">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Identificación">
                                    </div>

                                    <div class="col-6 ">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Código Estudiantil">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mt-4">
                                    <div class="col-6 ">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Nombre">
                                    </div>

                                    <div class="col-6 ">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Apellido">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mt-4">
                                    <div class="col-12">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Correo">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mt-4">
                                    <div class="col-12">
                                        <input type="email " class="form-control " id="exampleInputEmail1 " aria-describedby="emailHelp " placeholder="Contraseña">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mt-4">
                                    <div class="col-12">
                                        <button type="submit " class="btn btn-primary ">Volver</button>
                                        <button type="button " class="btn btn-primary ">Registrarse</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FIN VENTANA EMERGENTE REGISTRO-->


    <br>
    <br>
    <br>
@endsection
