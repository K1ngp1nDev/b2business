@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Offers</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Offers list</h3>
        </div>
        <div class="card-body">
            <table id="offers-table" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Price</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->name }}</td>
                        <td>
                            <a href="users/{{ $offer->creator->id }}">{{ $offer->creator->name }} {{ $offer->creator->surname }}</a>
                        </td>
                        <td>{{ $offer->price }}</td>
                        <td>
                            <a href="companies/{{ $offer->company->id }}">{{ $offer->company->name }}</a>
                        </td>
                        <td>{{ $offer->category->name }}</td>
                        <td>{{ $offer->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Price</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Created</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#offers-table').DataTable();
        } );
    </script>
@stop
