@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/companies/profile_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">
@endsection

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <header class="company-header col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="add-section-title"><strong>Редагувати профіль</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p class="add-section-title">{{ $company->name }}</p>
                            </div>
                            <div class="company-header--wrapper">
                                <form action="/company/profile/update" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-dropzone-wrapper col-sm-12 form-row" >
                                        <div action="{{ route('dropzone.upload', ['_token' => @csrf_token()]) }}" class="dropzone form-group" id="image-upload" name="file"></div>
                                    </div>
                                    <div class="form-group col">
                                        <input type="number" name="phone" class="form-control" aria-describedby="tel" value="" placeholder="Телефон" required>
                                    </div>
                                    <div class="form-group col">
                                        <input type="email" name="email" class="form-control" aria-describedby="email" placeholder="E-mail" value="" required>
                                    </div>
                                    <div class="form-group col">
                                        <button type="submit" class="btn btn-edit" id="publish">Редагувати</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"></script>

    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            // autoProcessQueue: false,
            // maxFilesize: 10,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictDefaultMessage: 'Додати лого',

            init:function () {
                var submitButton = document.querySelector('#publish');
                myDropzone = this;

                submitButton.addEventListener('click', function() {
                    myDropzone.processQueue();
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
