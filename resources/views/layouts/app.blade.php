<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    @yield('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="app">
        @includeWhen(empty($noheader), 'layouts.header')
        <main class="app_main_content">
            @yield('content')
        </main>
        @includeWhen(empty($nofooter), 'layouts.footer')
    </div>

    <script src="https://kit.fontawesome.com/d33db132e0.js" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/bootstrap.js') }}" defer></script>--}}
    <script src="{{ asset('/js/select2.js') }}" defer></script>
    @yield('js')
    <script>
        $('.search-box').hover( function(){
            $(this).width('250px')
            $(this).find('input').show()
            $(this).find('button[type="submit"]').width('12.8%')
        }, function(){
            $(this).removeAttr('style')
            $(this).find('input').removeAttr('style')
            $(this).find('button[type="submit"]').removeAttr('style')
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#e1").select2({
                    placeholder: "Регіон",
                    allowClear: true
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#header-nav-burger-icon').click(function(){
                $(this).toggleClass('open');
            });
        });
    </script>
    <script>
        $("#search-input-field").blur(function(){
            if( $(this).val() ){
                $("#clear-search-btn").css({"visibility": "visible"});
            }
        });
        $("#clear-search-btn").on('click', function (e) {
            $("#search-input-field").val('');
            $("#clear-search-btn").css({"visibility": "hidden"});
        });
    </script>
</body>
</html>
