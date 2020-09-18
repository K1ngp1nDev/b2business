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

{{--                                        @error('password')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
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
                                <a href="/login" id="login-form-link">Вхід</a>
                            </div>
                            <div class="col">
                                <a href="/register" class="active" id="register-form-link">Реєстрація</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="register-form" action="{{ route('register') }}" method="post" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <strong class="label">ПІБ</strong>
                                        <input type="text" name="name" tabindex="1" class="form-control @error('name') is-invalid @enderror" placeholder="ПІБ" value="" required>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">Серія та номер паспорту</strong>
                                        <input type="text" name="passport" tabindex="2" class="form-control @error('passport') is-invalid @enderror" placeholder="Серія та номер паспорту" value="" required>
                                    </div>
                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">ЄДРПОУ</strong>
                                        <input type="text" name="edrpou" tabindex="3" class="form-control @error('edrpou') is-invalid @enderror" placeholder="ЄДРПОУ" value="" required>
                                    </div>
                                    @error('edrpou')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group" disabled>
                                        <strong class="label">Назва компанії</strong>
                                        <input type="text" name="company_name" tabindex="4" class="form-control @error('company_name') is-invalid @enderror" placeholder="Назва компанії" required>
                                    </div>
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <!--  -->
                                    <div class="form-group">
                                        <strong class="label">Розрахунковий рахунок</strong>
                                        <input type="text" name="p_c" tabindex="5" class="form-control @error('p_c') is-invalid @enderror" placeholder="Розрахунковий рахунок" required>
                                    </div>
                                    @error('p_c')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">ІПН</strong>
                                        <input type="text" name="ipn" tabindex="6" class="form-control @error('ipn') is-invalid @enderror" placeholder="ІПН" required>
                                    </div>
                                    @error('ipn')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">Телефон</strong>
                                        <input type="number" name="phone" tabindex="7" class="form-control @error('phone') is-invalid @enderror" placeholder="Телефон" required>
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <!--  -->
                                    <div class="form-group">
                                        <strong class="label">E-mail</strong>
                                        <input type="email" name="email" tabindex="8" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" required>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">Пароль</strong>
                                        <input type="password" name="password" tabindex="9" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль" required>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <strong class="label">Підтвердження пароля</strong>
                                        <input type="password" class="form-control" tabindex="10" name="password_confirmation" required autocomplete="new-password" placeholder="Підтвердження пароля" required>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if (!$errors->isEmpty())
                                        <div class="alert alert-danger" role="alert">
                                            {!! $errors->first() !!}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <button type="submit" name="register-submit" tabindex="11" class="form-control btn btn-register">Зареєструватися</button>
                                    </div>
                                </form>
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
