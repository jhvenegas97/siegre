@extends('layouts.layoutInit')
@section('title','Restablecer Contraseña')

@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header text-center"> {{ __('Restablecer Contraseña') }}</div>

                    <div class="card-body me-2 ms-2">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3 flex-column">
                                <label for="email" class="col-12 col-form-label text-md-star">{{ __('E-Mail') }}</label>

                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-new">
                                        {{ __('Continuar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
