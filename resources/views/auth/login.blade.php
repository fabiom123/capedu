@extends('layouts.auth')

@section('content')
<div class="d-flex align-items-center" style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
        <div class="card navbar-shadow">
            <div class="card-header text-center">
                <h4 class="card-title">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h4>
                <p class="card-subtitle">Inicia sesión con</p>
            </div>
            <div class="card-body">

                <a href="student-dashboard.html" class="btn btn-light btn-block">
                    <span class="fab fa-google mr-2"></span>
                    Continua con Google
                </a>

                <div class="page-separator">
                    <div class="page-separator__text">o utiliza </div>
                </div>
                @isset($url)
                <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @endisset    
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Correo electrónico:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" type="email" required="" class="form-control form-control-prepended" placeholder="Correo electrónico">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </div>
                    @if (Route::has('password.request'))
                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-black-70" style="text-decoration: underline;"> {{ __('¿Olvidaste tu contraseña?') }}</a>
                    </div>
                    @endif
                </form>
            </div>
            <div class="card-footer text-center text-black-50">
                ¿No tienes una cuenta? <a href="guest-signup.html">Registrate gratis</a>
            </div>
        </div>
    </div>
</div>
@endsection
