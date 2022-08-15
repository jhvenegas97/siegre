@extends('layouts.layoutInit')
@section('title', 'Inicio sesión')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center mt-3">Iniciar Sesión</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="d-grid gap-2 m-3">
                    <a href="{{ route('login.google') }}" style="text-decoration: none">
                        <div class="d-grid gap-2 pt-2">
                            <button type="button" class="btn btn-primary btn-new">Google <i
                                    class="fa-brands fa-google"></i></button>
                        </div>
                    </a>
                </div>
                <div class="d-grid gap-2 ps-4 pe-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check d-flex flex-row gap-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
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
                    <div class="modal-footer pt-0 pb-0" style="display: block !important;">
                        <!--FOOTER DE VENTANA EMERGENTE NO DE TODO EL DOCUMENTO-->
                        <h6 class="text-center mt-2">¿Aún no tienes cuenta en SIEGRE?</h6>
                        <div class="d-grid gap-2 m-2">
                            <a href="{{ route('register') }}" style="text-decoration: none">
                                <div class="d-grid gap-2 pt-2">
                                    <button type="button" class="btn btn-primary btn-new" data-bs-toggle="modal"
                                        data-bs-target="#registro">Registrarse</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
