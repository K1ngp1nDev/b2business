@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Login') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Login') }}--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="container login-section--wrapper">
        <div class="row">
            <div class="col-sm-12 panel">
                <div class="panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col">
                                <a href="/login" class="active" id="login-form-link">Вхід</a>
                            </div>
                            <div class="col">
                                <a href="/register" id="register-form-link">Реєстрація</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="login-form" action="{{ route('login') }}" method="post" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <strong class="label">E-mail</strong>
                                        <input type="text" name="email" tabindex="1" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <strong class="label">Пароль</strong>
                                        <input type="password" name="password" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" name="login-submit" tabindex="3" class="form-control btn btn-login">Увійти</button>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if (Route::has('password.request'))
                                                    <div class="text-center">
                                                        <a href="{{ route('password.request') }}" name="forgot-password" tabindex="4" class="forgot-password">Забули пароль?</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
{{--                                <form id="register-form" action="{{ route('register') }}" method="post" role="form" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="name" tabindex="1" class="form-control" placeholder="ФІО" value="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="passport" tabindex="2" class="form-control" placeholder="Паспортні дані" value="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="edrpou" tabindex="3" class="form-control" placeholder="ЄДКПОУ" value="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" disabled>--}}
{{--                                        <input type="text" name="company_name" tabindex="4" class="form-control" placeholder="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" name="email" tabindex="5" class="form-control" placeholder="E-mail">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="password" name="password" tabindex="6" class="form-control" placeholder="Password">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="password" name="confirm-password" tabindex="7" class="form-control" placeholder="Confirm Password">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <button type="submit" name="register-submit" tabindex="8" class="form-control btn btn-register">Зареєструватися</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('css')
    <link rel="stylesheet" href="css/login.css">
@endsection

@section('js')
{{--    <script--}}
{{--        src="https://code.jquery.com/jquery-3.5.1.min.js"--}}
{{--        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="--}}
{{--        crossorigin="anonymous"></script>--}}
{{--    <script>--}}
{{--        $(function() {--}}
{{--            $('#login-form-link').click(function(e) {--}}
{{--                $("#login-form").fadeIn(0);--}}
{{--                $("#register-form").fadeOut(0);--}}
{{--                $('#register-form-link').removeClass('active');--}}
{{--                $(this).addClass('active');--}}
{{--                e.preventDefault();--}}
{{--            });--}}
{{--            $('#register-form-link').click(function(e) {--}}
{{--                $("#register-form").fadeIn(0);--}}
{{--                $("#login-form").fadeOut(0);--}}
{{--                $('#login-form-link').removeClass('active');--}}
{{--                $(this).addClass('active');--}}
{{--                e.preventDefault();--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
