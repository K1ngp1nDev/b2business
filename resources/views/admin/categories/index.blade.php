@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Main categories list</h3>
        </div>
        <div class="card-body">
            <table id="categories-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Подкатегории</th>
                    <th>Создана</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category->id == $category->parent_id)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a></td>
                            <td>{{ count($category->subcategories) - 1 }} подкатегорий</td>
                            <td>{{ $category->created_at }}</td>
{{--                            <td>--}}
{{--                                <a class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" data-title="Редактировать">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </a>--}}
{{--                                <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-title="Удалить">--}}
{{--                                    <i class="fa fa-trash-alt"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
                        </tr>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Подкатегории</th>
                    <th>Создана</th>
                </tr>
                </tfoot>
            </table>
            <a class="btn btn-success" href="categories/add">Добавить</a>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#categories-table').DataTable();
        } );
    </script>
@stop
