@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_offer.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
@endsection

@section('content')
    <section class="add-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="add-section-title">Редагувати оголошення</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <form action="/offer/{{ $offer->id }}/update" method="post">
                                @csrf
                                <div class="form-row form-row--add">
                                    <div class="form-group col-sm-12">
                                        <strong class="label">Назва</strong>
                                        <input type="text" name="name" class="form-control"
                                               aria-describedby="title" value="{{ $offer->name }}" placeholder="Назва" required>
                                    </div>

                                    <div class="form-dropzone-wrapper col-sm-12 form-row" >
                                        <div action="{{ route('dropzone.upload', ['_token' => @csrf_token()]) }}"
                                             class="dropzone form-group" id="image-upload" name="file"></div>

                                        @if (!empty($photos))
                                            <div class="edit-photos-container">
                                                @foreach($photos as $key => $photo)
                                                    <input name="images[]" value="{{ substr($photo, 15) }}" style="display:none;">
                                                    <div class="edit-photos-list-item"
                                                         data-slide-to='{{ $key }}'
                                                         style="background-image: url({{ asset($photo) }});
                                                             background-repeat: no-repeat;
                                                             background-position: center center;
                                                             background-size: cover;
                                                             /*background-attachment: fixed;*/

                                                             ">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    </div>
{{--                                    <div class="form-group col-sm-6"></div>--}}
                                    <div class="form-group col-sm-6">
                                        <strong class="label">Ціна(грн)</strong>
                                        <input type="number" name="price" class="form-control" aria-describedby="price" value="{{ $offer->price }}" placeholder="Ціна" required>
                                    </div>
{{--                                    <div class="form-group col-sm-6"></div>--}}
                                    <div class="form-group col-sm-6">
                                        <strong class="label">Кількість</strong>
                                        <input type="number" name="count" class="form-control" aria-describedby="quantity" placeholder="Кількість" value="{{ $offer->count }}" required>
                                    </div>
{{--                                    <div class="form-group col-sm-6"></div>--}}
                                    <div class="form-group col-sm-6">
                                        <strong class="label">Категорія</strong>
                                        <div class="dropdown add-category">
                                            <select class="custom-select" name="category_id">
                                                @foreach($categories as $category)
                                                    <option class="dropdown-item" value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="form-group col-sm-6"></div>--}}
                                    <div class="form-group col-sm-6">
                                        <strong class="label">Регіон</strong>
                                        <div class="dropdown add-category">
                                            <select class="custom-select" name="region_id">
                                                @foreach($regions as $region)
                                                    <option class="dropdown-item" value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <strong class="label">Короткий опис</strong></div>
                                    <div class="form-group col-sm-12">
                                        <textarea type="text" name="excerpt" class="form-control"
                                                  aria-describedby="title" placeholder="Короткий опис">{{ $offer->excerpt }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <strong class="label">Повний опис</strong></div>
                                    <div class="form-group col-sm-12">
                                        <textarea type="text" name="text" class="form-control" rows="10"
                                                  aria-describedby="title" placeholder="Опис" required>{{ $offer->text }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <button type="submit" class="btn btn-publish" id="publish">Опубліковати</button>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <button type="submit" class="btn btn-draft">Чорновик</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <form>
                                <div class="form-row form-row--add">
                                    <div class="form-group col-sm-12">
                                        <button class="btn btn-top3-active">
                                            <img src="{{ asset('/img/top3.svg') }}" alt="">
{{--                                            <p>Послуга</p>--}}
                                            <p><strong>В топ-3 на тиждень</strong></p>
                                        </button>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <button class="btn btn-top5-active">
                                            <img src="{{ asset('/img/top5.svg') }}" alt="">
{{--                                            <p>Послуга</p>--}}
                                            <p><strong>В топ-5 на тиждень</strong></p></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"></script>

    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            // autoProcessQueue: false,
            // maxFilesize: 10,
            maxFiles: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictDefaultMessage: 'Додати нові фото',

            init:function () {
                var submitButton = document.querySelector('#publish');
                myDropzone = this;

                submitButton.addEventListener('click', function() {
                    console.log('1');
                    myDropzone.processQueue();
                    console.log('2');
                });

                this.on('complete', function () {
                    console.log('complete');
                })
            },

            success:function (data) {
                console.log(data['upload']['filename']);
                $('.form-dropzone-wrapper').append('<input name="images[]" value="' + data['upload']['filename'] + '" style="display:none;">');
            }
        };
    </script>
@endsection
