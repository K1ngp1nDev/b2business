@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
    <h1>{{ $company->name }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Company info</h3>
        </div>
        <div class="card-body">

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

@stop
