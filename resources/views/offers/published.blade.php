@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/published.css') }}">
@endsection

@section('content')
    <section class="published-wrapper">
        <div class="container">
            <header class="published-header">
                <p class="published-section-title">Публікація успішна</p>
                <a href="/offer/{{ $offer->id }}" target="_blank">Перейти до публікації</a>
            </header>


            <div class="container">
                <div class="row published-wrapper-items">
                    <div class="col-sm-12 published-item">
                        <div class="published-item-thumb col-sm-2"
                                style="background-image: @if(!empty($offer->main_photo)) url({{ asset($offer->main_photo) }}) @else url({{ asset('/img/no_image.png') }}) @endif;
                                background-repeat: no-repeat;
                                background-position: center center;
                                background-size: cover;">
                        </div>
                        <div class="published-item-desrc col-sm-9">
                            <h5 class="published-item-title">{{ $offer->name }}</h5>
                            <p class="published-item-price">{{ $offer->price }} грн</p>
                            <p class="published-item-text">Опис: {{ $offer->text }}</p>
                            <p>Кількість:&nbsp;{{ $offer->count }} шт в наявності</p>
                            <p class="card-published">Опубліковано {{ $offer->created_at }}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 form-row form-row-published">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-stock-active">
                                    <img src="{{ asset('/img/promotion.svg') }}" alt="" class="published-icons">
                                    <p class="published-list-title">Просувати пропозицію</p>
                                    <p class="published-list-items"><img src="/img/check.svg" class="icon-check">&nbsp;Підняття вгору списку</p>
                                    <p class="published-list-items"><img src="/img/check.svg" class="icon-check"> Топ-оголошення на 3 дні</p>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-stock-active">
                                    <img src="{{ asset('/img/star.svg') }}" alt="" class="published-icons">
                                    <p class="published-list-title">Просувати пропозицію</p>
                                    <p class="published-list-items"><img src="/img/check.svg" class="icon-check">&nbsp;Підняття вгору списку</p>
                                    <p class="published-list-items"><img src="/img/check.svg" class="icon-check">&nbsp;Топ-оголошення на 3 дні</p>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <a href="/offer/{{ $offer->id }}/edit">
                                <button class="btn btn-stock-active" >
                                 <img src="{{ asset('/img/pensil.svg') }}" alt="" class="published-icons">
                                    <p class="published-list-title">Редагувати пропозицію</p>
                                    <p class="published-list-items" style="visibility:hidden;">.</p>
                                    <p class="published-list-items" style="visibility:hidden;">.</p>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="published-section-title">Інші послуги</p>
            <div class="col-sm-12 published-section-item-price-wrapper">
                <div class="form-group">
                    <input class="form-check-input"  type="checkbox" id="top3-published"/>
                    <label class="form-check-label" for="top3-published">
                        В топ-3 на тиждень
                    </label>
                    <span class="published-price">100 грн</span>
                </div>
            </div>
            <div class="col-sm-12 published-section-item-price-wrapper">
                <div class="form-group">
                    <input class="form-check-input"  type="checkbox" id="to5-published"/>
                    <label class="form-check-label" for="top5-published">
                        В топ-5 на тиждень
                    </label>
                    <span class="published-price">80 грн</span>
                </div>
            </div>
            <div class="col-sm-12 published-section-item-price-wrapper">
                <div class="form-group">
                    <input class="form-check-input"  type="checkbox" id="top10-published"/>
                    <label class="form-check-label" for="top10-published">
                        В топ-10 на тиждень
                    </label>
                    <span class="published-price">50 грн</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}



@endsection
