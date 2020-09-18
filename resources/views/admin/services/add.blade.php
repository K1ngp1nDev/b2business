@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
    <h1>New service</h1>
@stop

@section('content')

    <div class="card card-outline card-info">

        <div class="card-body pad">
            <form method="post" action="/admin/services/add" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter ..." value="">
                    </div>
                    <label>Description</label>
                    <textarea id="summernote" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'News text',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['picture']
                ],
                // callbacks: {
                //     onImageUpload: function(files, editor) {
                //         for (var i = files.length - 1; i > 0; i--) {
                //             sendFile(files[i], this);
                //         }
                //     }
                // }
            });
            // function sendFile(file, el) {
            //     var formData = new FormData();
            //     formData.append('file', file);
            //     console.log(file);
            //     console.log('ferfe');
            //     $(el).summernote('forjkofr');
            // }
        });
    </script>
@stop
