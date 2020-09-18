@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
        <h3 class="box-title">Companies list</h3>
        </div>
    <div class="card-body">
        <table id="companies-table" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>EDRPOU</th>
                <th>Members</th>
                <th>Director</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>
                        <a href="companies/{{ $company->id }}">{{ $company->name }}</a>
                    </td>
                    <td>{{ $company->edrpou }}</td>
                    <td>{{ count($company->members) }}</td>
                    <td>
                        <a href="users/{{ $company->director->id }}">{{ $company->director->name }} {{ $company->director->surname }}</a>
                    </td>
                    <td>{{ $company->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>EDRPOU</th>
                <th>Members</th>
                <th>Director</th>
                <th>Created</th>
            </tr>
            </tfoot>
        </table>
    </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#companies-table').DataTable({
                "language": {
                    "url": "@lang('datatables.json')"
                }
            });
        });
    </script>
@stop
