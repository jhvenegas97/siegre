@extends('layouts.layoutInit')
@section('title','Confirmar Contraseña')

@section('content')
    <br>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card-header text-center">{{ __('Confirmar Contraseña') }}</div>

                <div class="card-body text-center">
                    {{ __('Por favor confirma tu contraseña antes de continuar.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3 flex-column">
                            <label for="password" class="col-12 col-form-label text-md-start">{{ __('Contraseña') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 flex-column">
                                <button type="submit" class="btn btn-primary btn-new">
                                    {{ __('Confirmar Contraseña') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidó su contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
