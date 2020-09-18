@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')

    @include('offers.filters')

    <div class="container">
        <div class="row">
            <section class="category-filtered-items-wrapper">
                <div class="category-filtered-items-counter">

                </div>
                <div class="category-filtered-items-list">
                    @foreach($offers as $offer)
                        <a href="/offer/{{ $offer->id }}">
                            <div class="category-filtered-item">
                                <div class="category-filtered-item-thumb col-sm-3"
                                    style="background-image: url({{ asset($offer->main_photo) }});
                                            background-repeat: no-repeat;
                                            background-position: center center;
                                            background-size: cover;
                                            width: 235px;
                                            height: auto;">
                                </div>
                                <div class="category-filtered-item-desrc col-sm-9">
                                    <h5 class="category-filtered-item-title">{{ $offer->name }}</h5>
                                    <p class="category-filtered-item-price">{{ $offer->price }} грн</p>
                                    <p class="category-filtered-item-text">{{ $offer->excerpt }}</p>
                                    <p class="card-published">{{ $offer->created_at }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
{{--                    <a href="#">--}}
{{--                        <div class="category-filtered-item">--}}
{{--                            <div class="category-filtered-item-thumb">--}}
{{--                                <img class="category-filtered-item-img" src="img/card-img-big.png" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="category-filtered-item-desrc">--}}
{{--                                <h5 class="category-filtered-item-title">Двоповерховий будинок</h5>--}}
{{--                                <p class="category-filtered-item-price">500 000 грн</p>--}}
{{--                                <p class="category-filtered-item-text"> Раніше вважалося, що ставкова жаба є--}}
{{--                                    підвидом жаби їстівної Р. esculentus (Р. esculentus lessonae),--}}
{{--                                    і остання трапляється в межах більшої частини України, а Р.--}}
{{--                                    esculentus esculentus живе у пониззі Дунаю та на Закарпатті.</p>--}}
{{--                                <p class="card-published">О4.06.2020</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
                </div>
                @if(!empty($offers))
                    <div class="category-filtered-pagination">
                        <span>{{ $offers->links() }}</span>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}



@endsection
