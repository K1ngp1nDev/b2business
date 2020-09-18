@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/companies/show.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="company-offers--wrapper">
            <div class="container">
                <div class="row">
                    <header class="company-header">
                        <div class="">
                            <a href="#">
                                <img src="@if(!empty($company->photo)) {{ '/' . $company->photo }} @else {{ asset('/img/no_image.png') }} @endif" alt="logo-company" class='logo-company'>
                                <span class="title-company">{{ $company->name }}</span>
                            </a>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-contact handle_margin_nav">Зв’язатись з компанією</button>
                        </div>
                    </header>
                    <section class="company-offers">
                        <h3>Пропозиції компанії</h3>
                        <div class="card-deck">
                            @foreach($offers as $offer)
                                <a href="/offer/{{ $offer->id }}">
                                    <div class="card">
                                        <img src="@if(!empty($offer->main_photo)) {{ '/' . $offer->main_photo }} @else {{ asset('/img/no_image.png') }} @endif" class="card-img-top" alt="img/card_img.png">
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
    </div>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}



@endsection
