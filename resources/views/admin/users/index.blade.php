@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Users list</h3>
        </div>
        <div class="card-body">
            <table id="users-table" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                <thead>
                <tr>
                    <th>{{ __('admin/users.id') }}</th>
                    <th>{{ __('admin/users.name') }}</th>
                    <th>{{ __('admin/users.email') }}</th>
                    <th>{{ __('admin/users.created') }}</th>
                    <th>{{ __('admin/users.last_login') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="users/{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->last_login }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ __('admin/users.id') }}</th>
                    <th>{{ __('admin/users.name') }}</th>
                    <th>{{ __('admin/users.email') }}</th>
                    <th>{{ __('admin/users.created') }}</th>
                    <th>{{ __('admin/users.last_login') }}</th>
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
            $('#users-table').DataTable();
        } );
    </script>
@stop
