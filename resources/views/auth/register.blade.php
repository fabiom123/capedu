@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center" style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
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
                <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                @else
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @endisset
                @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name:</label>
                        <div class="input-group input-group-merge">
                            <input id="name" type="text" required="" class="form-control form-control-prepended" placeholder="Your first and last name">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email address:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Choose a password">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password2">Password:</label>
                        <div class="input-group input-group-merge">
                            <input id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirm password">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                    <div class="form-group text-center mb-0">
                        <div class="custom-control custom-checkbox">
                            <input id="terms" type="checkbox" class="custom-control-input" checked required="">
                            <label for="terms" class="custom-control-label text-black-70">I agree to the <a href="#" class="text-black-70" style="text-decoration: underline;">Terms of Use</a></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-black-50">Already signed up? <a href="guest-login.html">Login</a></div>
        </div>
    </div>
</div>
@endsection

