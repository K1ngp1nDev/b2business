@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Company info</h3>
        </div>
        <div class="card-body">
            <table id="services-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created</th>
                </tr>
                </tfoot>
            </table>
            <a class="btn btn-success" href="services/new">Add</a>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#services-table').DataTable();
        } );
    </script>
@stop
