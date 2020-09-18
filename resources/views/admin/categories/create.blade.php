@extends('adminlte::page')

@section('title', 'Категории')

@section('content_header')
    <h1>Новая категория</h1>
@stop

@section('content')

    <div class="card card-outline card-success">

        <div class="card-body">
            <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Введите название..." value="">
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <select class="form-control" name="parent_id">
                        <option value="0">Без родительской категории</option>
                        @foreach($categories as $category)
                            <option @if($category->id == $parent_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop
