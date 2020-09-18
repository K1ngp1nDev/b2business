@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('content')

    <section class="container login-section--wrapper">
        <div class="row">
            <div class="col-sm-12 panel">
                <div class="panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="active" id="login-form-link">Вхід</a>
                            </div>
                            <div class="col">
                                <a href="#" id="register-form-link">Реєстрація</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="login-form" action="#" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" tabindex="1" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" tabindex="2" class="form-control" placeholder="Пароль">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="submit" name="login-submit" tabindex="3" class="form-control btn btn-login" value="Увійти">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" name="forgot-password" tabindex="4" class="forgot-password">Забули пароль?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="#" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" tabindex="1" class="form-control" placeholder="ФІО" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" tabindex="2" class="form-control" placeholder="Паспортні дані" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" tabindex="3" class="form-control" placeholder="ЄДКПОУ" value="">
                                    </div>
                                    <div class="form-group" disabled>
                                        <input type="text" name="disabled-field" tabindex="4" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" tabindex="5" class="form-control" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" tabindex="6" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" tabindex="7" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="register-submit" tabindex="8" class="form-control btn btn-register" value="Зареєструватись">
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

@section('js')
    <script>
        $(function() {
            $('#login-form-link').click(function(e) {
                $("#login-form").fadeIn(0);
                $("#register-form").fadeOut(0);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").fadeIn(0);
                $("#login-form").fadeOut(0);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });
    </script>

@endsection
