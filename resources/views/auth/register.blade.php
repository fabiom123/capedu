@extends('layouts.auth')

@section('content')
<div class="d-flex align-items-center" style="min-height: 100vh">
    <div class="col-sm-12 col-md-8 col-lg-6 mx-auto" style="min-width: 300px;">
        <div class="card navbar-shadow">
            <div class="card-header text-center">
                <h4 class="card-title">{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</h4>
                <p class="card-subtitle">Create a new account</p>
            </div>
            <div class="card-body">

                <a href="student-dashboard.html" class="btn btn-light btn-block">
                    <span class="fab fa-google mr-2"></span>
                    Continue with Google
                </a>

                <div class="page-separator">
                    <div class="page-separator__text">or</div>
                </div>
                
                @isset($url)
                <form method="POST" class="row" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                @else
                <form method="POST" class="row" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @endisset
                @csrf
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label" for="name">Nombres:</label>
                        <div class="input-group input-group-merge">
                            <input id="name" type="text" required="" class="form-control form-control-prepended" placeholder="Ingresa tu nombre">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label" for="name">Apellidos:</label>
                        <div class="input-group input-group-merge">
                            <input id="name" type="text" required="" class="form-control form-control-prepended" placeholder="Ingresa tu apellido">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-user-plus"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label class="form-label" for="email">Correo Electrónico:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" type="email" required="" class="form-control form-control-prepen  ded" placeholder="Ingresa tu correo electrónico">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label" for="password">Contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Ingresa Contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label" for="password2">Repetir contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirma tu contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Registrarse</button>
                    <!--<div class="form-group text-center mb-0">
                        <div class="custom-control custom-checkbox">
                            <input id="terms" type="checkbox" class="custom-control-input" checked required="">
                            <label for="terms" class="custom-control-label text-black-70">Estas de acuerdo con los <a href="#" class="text-black-70" style="text-decoration: underline;">Términos de Uso</a></label>
                        </div>
                    </div>-->
                </form>
            </div>
            <div class="card-footer text-center text-black-50">¿Ya tienes cuenta? <a href="/login">Iniciar sesión</a></div>
        </div>
    </div>
</div>
@endsection

