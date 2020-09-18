@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/companies/profile.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <header class="company-header">
                        <div class="company-header--wrapper">
                            <div class="company-logo--wrapper">
                                <img src="@if(!empty($company->logo)) {{ $company->logo }} @else {{ asset('img/no_image.png') }} @endif" alt="logo-company" class='logo-company'>
                            </div>
                            <div class="company-contacts--wrapper">
                                <ul class="company-contacts-list">
                                    <li class="company-contacts-item">{{ $company->name }}</li>
                                    <li class="company-contacts-item">ЄДРПОУ: {{ $company->edrpou }}</li>
                                    <li class="company-contacts-item">ІПН: {{ $company->ipn }}</li>
                                    <li class="company-contacts-item">Телефон: {{ $company->company_phone }}</li>
                                    <li class="company-contacts-item">E-mail: @if(!empty($company->email)) {{ $company->email }} @else {{ $company->director->email }} @endif</li>
                                </ul>
                            </div>
                        </div>

                        <div class="company-contacts-buttons--wrapper">
                            <a href="/offer/add" class="btn btn-add-offer">Додати пропозицію</a>
                            <a href="#" class="btn btn-add-manager">Додати менеджера</a>
                            <a href="#" class="btn btn-change-plan">Змінити тариф</a>
                            <a href="/company/profile/edit" class="btn btn-edit-profile">Редагувати профіль</a>
                        </div>

                    </header>
                    <section class="company-tables container-fluid">
                        <div class="row">
                            <div class="col-sm-2 company-tables-tabs-wrapper">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item nav-link-tab">
                                        <a class="nav-link active" data-toggle="tab" href="#offers">Пропозиції</a>
                                    </li>
                                    <li class="nav-item nav-link-tab">
                                        <a class="nav-link " data-toggle="tab" href="#chats">Чати</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="offers">
{{--                                        <table class="table-offers table table-striped yajra-datatable" >--}}
                                        <table class="table table-striped yajra-datatable" >
                                            @if(!isset($offers[0]))
                                                <thead style="text-align: center">
                                                <tr scope="row">
                                                    <td>У вас ще немає публікацій. Додайте свою пропозицію</td>
                                                </tr>
                                            @else
                                            <thead>
                                            <tr>
                                                <th scope="col">Назва пропозиції</th>
                                                <th scope="col">Дата розміщення</th>
                                                <th scope="col">Розмістив</th>
                                                <th scope="col">Редагувати</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($offers as $offer)
                                                    <tr scope="row">
                                                        <td aria-label="Пропозиція">{{ $offer->name }}</td>
                                                        <td aria-label="Дата">{{ \Carbon\Carbon::parse($offer->created_at)->format('d.m.Y') }}</td>
                                                        <td aria-label="Розмістив">{{ $offer->creator->name }}</td>
                                                        <td aria-label="Редагувати"><a href="/offer/{{ $offer->id }}/edit">Редагувати</a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="chats">
                                        <table class="table-chats table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Назва пропозиції</th>
                                                <th scope="col">Учасники</th>
                                                <th scope="col">Покупець</th>
                                                <th scope="col">Увійти</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($chats as $chat)
                                                    <tr scope="row">
                                                        <td aria-label="Пропозиція">{{ $chat->offer->name }}</td>
                                                        <td aria-label="Дата">{{ $chat->created_at }}</td>
                                                        <td aria-label="Співрозмовник">{{ $chat->customer->name }}</td>
                                                        <td aria-label="Увійти"><a href="/chat/{{ $chat->id }}">Приєднатися</a></td>
                                                    </tr>
                                                @endforeach
{{--                                            <tr scope="row">--}}
{{--                                                <td aria-label="Пропозиція">Склади чернігівська область</td>--}}
{{--                                                <td aria-label="Дата">25.06.2020</td>--}}
{{--                                                <td aria-label="Розмістив">Головний менеджер</td>--}}
{{--                                                <td aria-label="Увійти"><a href="#">Увійти</a></td>--}}
{{--                                            </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            $('.yajra-datatable').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: "{{ route('company.profile') }}",--}}
{{--                columns: [--}}
{{--                    {data: 'id', name: 'id'},--}}
{{--                    {--}}
{{--                        data: 'photo',--}}
{{--                        name: 'photo',--}}
{{--                        orderable: true,--}}
{{--                        searchable: true--}}
{{--                    },--}}
{{--                    {data: 'name', name: 'name'},--}}
{{--                    {data: 'position', name: 'position_id'},--}}
{{--                    {data: 'emp_date', name: 'emp_date'},--}}
{{--                    {data: 'phone', name: 'phone'},--}}
{{--                    {data: 'email', name: 'email'},--}}
{{--                    {data: 'wage', name: 'wage'},--}}
{{--                    {--}}
{{--                        data: 'action',--}}
{{--                        name: 'action',--}}
{{--                        orderable: true,--}}
{{--                        searchable: true--}}
{{--                    },--}}
{{--                ]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
