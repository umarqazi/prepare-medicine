@extends('backend.master-backend')

@section('js-css')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <style type="text/css">
        .btn_custom_style{
            background-color: #ddd;
            color: #000
        }
    </style>
@endsection

@section('content')

    <div class="alert alert-info" role="alert">Create New Permission</div>
    @include('msg.msg')

    <form action="{{ route('permission.store') }}" method="POST">
        @csrf
        <label><b>Permission Name</b></label>
        <input id="title" type="text" name="name" placeholder="Enter Permission..." class="form-control">
        <br>
        <input type="submit" class="btn btn_custom_style" value="CREATE" style="float:right">
    </form>

@endsection
