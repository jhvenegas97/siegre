@extends('layouts.layoutInit')
@section('title','Inicio sesión')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header text-center">{{ __('Registro') }}</div>

                    <div class="card-body me-2 ms-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 flex-column">
                                <label for="name" class="col-12 col-form-label text-md-star">{{ __('Nombre') }}</label>

                                <div class="col-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 flex-column">
                                <label for="email" class="col-12 col-form-label text-md-start">{{ __('E-Mail') }}</label>

                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 flex-column">
                                <label for="password" class="col-12 col-form-label text-md-start">{{ __('Contraseña') }}</label>

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 flex-column">
                                <label for="password-confirm" class="col-12 col-form-label text-md-start">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3 flex-column">
                                <label for="documento-id" class="col-12 col-form-label text-md-start">{{ __('Documento de identificación') }}</label>

                                <div class="col-12">
                                    <input id="documento" type="text" class="form-control @error('documento') is-invalid @enderror" name="documento" required autocomplete="new-documento">

                                    @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-new">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
