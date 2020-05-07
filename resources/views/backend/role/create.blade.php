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

    <div class="alert alert-info" role="alert">Create New Role</div>
    @include('msg.msg')

    <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label><b>Role Name</b></label>
        <input id="title" type="text" name="name" placeholder="Enter Role..." class="form-control">
        <br>

        <div class="form-group">
            <div>
                <label><b>Permissions</b></label>
            </div>
            <div>
                <span><input class="form-control" type="checkbox"></span>
                <span><input class="form-control" type="checkbox"></span>
                <span><input class="form-control" type="checkbox"></span>
                <span><input class="form-control" type="checkbox"></span>
                <span><input class="form-control" type="checkbox"></span>
                <span><input class="form-control" type="checkbox"></span>
            </div>
        </div>
        <input type="submit" class="btn btn_custom_style" value="POST" style="float:right">
    </form>

@endsection
