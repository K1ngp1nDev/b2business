@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('content')

    <div class="container">
        <div class="row aside-and-slider">
            <nav class="col-sm-3 sidebar-category-menu  d-none d-lg-flex ">
                <ul class="sidebar-category-menu-list">
                    @foreach($categories as $category)
                        @if($category->id == $category->parent_id)
                    <a href="/offers?category={{ $category->id }}&"><li class="sidebar-category-menu-item">{{ $category->name }}
{{--                            <i class="fa fa-caret-right" aria-hidden="true"></i>--}}
                            <i class="fa fa-caret-right" aria-hidden="true"></i></li></a>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <div class="col-sm-9  owl-carousel owl-theme home-main-slider" id="owl-carousel-1">
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
                <div class="item"><a href="#"><img src="img/main_banner1.png"></a></div>
            </div>
{{--            <div class="col-sm-12">--}}
{{--                <button class="btn btn-primary" type="button"--}}
{{--                        data-toggle="collapse" data-target="#mobCatalog"--}}
{{--                        aria-expanded="false" aria-controls="collapseExample">--}}
{{--                    Каталог пропозицій--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="collapse col-sm-12" id="mobCatalog">--}}
{{--                <div class="card card-body">--}}
{{--                    <ul class="sidebar-category-menu-list">--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Недвижимость </li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Авто </li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Производство</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Бизнес</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Земля</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Продукты питания</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Для офиса</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Программирование</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item">Производство</li></a>--}}
{{--                        <a href="#"><li class="sidebar-category-menu-item show-all-category">Показать всё</li></a>--}}
{{--                    </ul></div>--}}
{{--            </div>--}}
        </div>
    </div>
    </div>
    <div class="top-offers--wrapper">
        <div class="container">
            <div class="row">
                <section class="top-offers">
                    <h3>ТОП пропозиції</h3>
                    <div class="card-deck">
                        @foreach($offers as $offer)
                        <a href="/offer/{{ $offer->id }}">
                            <div class="card">
                                <img src="@if(!empty($offer->main_photo)) {{ $offer->main_photo }} @else {{ asset('img/no_image.png') }} @endif" class="card-img-top" alt="img/card_img.png">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $offer->name }}</h5>
                                    <p class="card-text">{{ $offer->excerpt }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="main-banner">
        <div class="container">
            <div class="row">
                <div class="main-banner--wrapper">
                    <h1>Партнерство заради майбутнього</h1>
                    <p>Колективне ділове медіа</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container companies-wrapper">
        <div class="row">
            <section>
                <h3 class="companies-title">Компанії</h3>
            </section>
            <div class="col-sm-12 owl-carousel owl-theme companies-main-slider" id="owl-carousel-3">
                <div class="item"><a href="#"><img src="img/banner_che.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_goo.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_mic.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_che.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_goo.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_mic.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_che.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_goo.png"></a></div>
                <div class="item"><a href="#"><img src="img/banner_mic.png"></a></div>
            </div>
        </div>
    </div>

@endsection

@section('js')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}

    <script>

        var carousel = $('#owl-carousel-1').owlCarousel({
            items: 1,
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>',
                '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
        });
        carousel.on('click', '.owl-item', function () {
            var click = $(this).index();
            carousel.trigger( 'to.owl.carousel', [click] )
        });

        var carousel_3 = $('#owl-carousel-3').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>',
                '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
            responsive:{
                0:{items:1},
                800:{items:2},
                1200:{items:3}

            },
        });
        carousel_3.on('click', '.owl-item', function () {
            var click = $(this).index();
            carousel_3.trigger( 'to.owl.carousel', [click] )
        });

    </script>

@endsection
