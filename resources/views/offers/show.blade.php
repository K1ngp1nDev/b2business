@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

    <div class="main_wrapper">
        <div class="container">
            <div class="row">
                <div class="product-card col-sm-12">
                    <div class="row show-card--wrapper">
                        <div class="col-sm-5">
                            <div class="card">
                                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                                    @if(empty($photos))
                                        <div class='carousel-inner'>
                                            <div class='carousel-item active'
                                                 style="background-image: url({{ asset('/img/no_image.png') }});
                                                     background-repeat: no-repeat;
                                                     background-position: center center;
                                                     background-size: contain; ">
                                            </div>
                                        </div>
                                    @else
                                        <div class='carousel-inner'>
                                        @foreach($photos as $key => $photo)
                                                <div class='carousel-item @if($key == 0)active @endif'
                                                     style="background-image: url({{ asset($photo) }});
                                                         background-repeat: no-repeat;
                                                         background-position: center center;
                                                         background-size: contain; ">
                                                </div>
                                        @endforeach
                                        </div>
                                        @if(count($photos) > 1)
                                            <ol class='carousel-indicators'>
                                                @foreach($photos as $key => $photo)
                                                    <li data-target='#carousel-custom'
                                                        class='carousel-thumb @if($key == 0)active @endif'
                                                        data-slide-to='{{ $key }}'
                                                         style="background-image: url({{ asset($photo) }});
                                                             background-repeat: no-repeat;
                                                             background-position: center center;
                                                             background-size: contain; ">
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card">
                                <div class="card-body main-card-info">
                                    <h5 class="card-title">{{ $offer->name }}</h5>
                                    <p class="card-all-offers"><a href="/companies/{{ $offer->company->id }}/show">Усі пропозиції компанії {{ $offer->company->name }}</a></p><hr/>
                                    @if(!empty($offer->regions->first()))
                                    <p>{{ $offer->regions->first()->name }}</p>
                                    @endif
                                    <p class="card-price">{{ $offer->price }} грн</p>
                                    <p class="card-product-availability">Кількість:&nbsp;<span class="card-count">{{ $offer->count }} шт в наявності</span></p>
                                    <p class="card-published">Опубліковано {{ $offer->created_at }}</p>
                                    <p>
                                        @if(auth()->user())
                                            @if(auth()->user()->company_id != $offer->company->id)
                                                <button type="button" class="btn btn-card-checkout" data-toggle="modal" data-target="#checkout">
                                                    Оформити замовлення
                                                </button>
                                            @else
                                                <a href="/offer/{{ $offer->id }}/edit" class="btn btn-card-checkout">
                                                    Редагувати
                                                </a>
                                            @endif
                                        @endif
                                    </p>
                                                                <!-- Modal -->
                                    <form action="/offer/{{ $offer->id }}/order" method="get">
                                        <div class="modal fade" id="checkout" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle">{{ $offer->company->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6 class="modal-descr" id="modalDescr">{{ $offer->name }}</h6>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea class="form-control" name="text" id="message-text"
                                                        placeholder="Ваше повідомлення" required  autocomplete="off"></textarea>
                                                        <span id="textareaFeedback"> осталось 1024 символов</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                                        <button type="submit" class="btn btn-popup-send">Почати чат</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 card-descr-container">
                            <hr/>
                            <p class="card-text-title">Опис</p>
                            <p class="card-text">{{ $offer->text }}</p><hr/>
                        </div>
                    </div>
                    @if(count($offer->company->offers) > 1)
                    <div class="col-sm-12 other-offers--wrapper">
                        <section class="other-offers">
                            <h3>Інші пропозиції продавця</h3>
                            <div class="card-deck">
                                @foreach($offer->company->offers as $item)
                                    @if($item->id != $offer->id)
                                        <a href="/offer/{{ $item->id }}">
                                            <div class="card">
                                                <img src="{{ asset($item->main_photo) }}"
                                                     class="card-img-top" alt="{{ asset($item->main_photo) }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <p class="card-text">{{ $item->excerpt }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    var $area = $("#message-text"), $feed = $("#textareaFeedback"),
    maxLength = 1024;

    $('#message-text').on("input", function(){
    var val = this.value, selStart = this.selectionStart;

    val.length > maxLength && $area
    .val( val.substr(0, maxLength) )
    .prop({
    selectionStart : selStart,
    selectionEnd : selStart
    })
    ;

    var remaning = Math.max(maxLength - val.length, 0);
    $feed.html('осталось ' + remaning + ' символов ')
    });
    </script>
@endsection
