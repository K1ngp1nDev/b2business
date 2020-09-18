@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
@endsection

@section('content')
    <section class="contactus-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <form class="contactus-form">
                        <div class="form-group">
                            <label for="formGroupExampleInput"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ім'я">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput1"></label>
                            <input type="email" class="form-control" id="formGroupExampleInput1" placeholder="E-mail">
                        </div>
                        <div class="dropdown department-list">
                            <button class="form-control dropdown-toggle"
                                    id="navbarDropdown" role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"><span>Оберіть відділ звернення</span></button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                                <a class="dropdown-item" href="#">Lorem ipsum dolor, sit amet consectetur adipisicing elitelit. Mollitia.</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-send-notification">Надіслати</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}



@endsection
