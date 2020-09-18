@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Категории</h1>
@stop

@section('content')

    @if($category->parent_id != $category->id)
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="box-title">Родительская категория</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="/admin/categories/{{ $category->parent->id }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>Название</label>
                        <p>{{ $category->parent->name }}</p>
                    </div>
{{--                        <option value="0" @if($category->parent->parent_id == $category->id) selected @endif>Без родительской категории</option>--}}
{{--                        @foreach($categories as $item)--}}
{{--                            @if($item->parent->id != $item->id)--}}
{{--                            <option @if($category->parent->parent_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
                </div>
                <button type="submit" class="btn btn-success">Перейти</button>
            </form>
        </div>
    </div>
    @endif

    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="box-title">Настройки категории</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" name="name" placeholder="Введите название..." value="{{ $category->name }}">
                    </div>
                    <label>Родительская категория</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Без родительской категории</option>
                        @foreach($categories as $item)
                            <option @if($category->parent_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">Обновить</button>
{{--                <button type="submit" class="btn btn-danger">Удалить</button>--}}
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-secondary">
                    Удалить
                </button>
            </form>
        </div>
    </div>

    <form method="POST" action="/admin/categories/{{ $category->id }}/destroy" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
            <div class="modal fade show" id="modal-secondary" style="display: none; padding-right: 17px;" aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-default">
                        <div class="modal-header">
                            <h4 class="modal-title">Удалить категорию?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <p>При удалении категории удалятся все вложенные подкатегории. Данное действие нельзя будет отменить</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-danger">Да, удалить</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    </form>

    @if(!empty($subcategories))
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="box-title">Список подкатегорий</h3>
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
                @foreach($subcategories as $subcategory)
                    @if($subcategory->id != $subcategory->parent_id)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td><a href="/admin/categories/{{ $subcategory->id }}">{{ $subcategory->name }}</a></td>
                            <td>@if($subcategory->id == $subcategory->parent_id)
                                    {{ count($subcategory->subcategories) - 1 }}
                                @else
                                    {{ count($subcategory->subcategories) }}
                                @endif
                                подкатегорий</td>
                            <td>{{ $subcategory->created_at }}</td>
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
            </table>
            <a class="btn btn-info" href="{{ route('admin.categories.create', ['id' => $category->id]) }}">Добавить</a>
        </div>
    </div>
    @endif

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
