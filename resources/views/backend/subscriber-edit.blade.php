@extends('backend.master-backend')

@section('js-css')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <style type="text/css">
        .btn_custom_style{
            background-color: #ddd;
            color: #000
        }
        .current img{
            width: 200px
        }
    </style>
@endsection

@section('content')

    <div class="alert alert-info" role="alert">Edit Subscriber Information</div>
    @include('msg.msg')

    <form action="{{ route('update_subscriber', $subscriber->id) }}" method="post">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label><b>First Name</b></label>
            <input id="title" type="text" name="f_name" class="form-control" value="{{$subscriber->f_name}}">
        </div>

        <div class="form-group">
            <label><b>Second Name</b></label>
            <input id="title" type="text" name="s_name" class="form-control" value="{{$subscriber->s_name}}">
        </div>

        <div class="form-group">
            <label><b>Email</b></label>
            <input type="text" name="email" placeholder="Enter Email..." class="form-control"  value="{{$subscriber->email}}">
        </div>

        <div class="form-group">
            <label><b>Status</b></label>
            <select name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1">Enable</option>
                <option value="0">Disable</option>
            </select>
        </div>

        <div class="form-group">
            <label><b>License Extension</b></label>
            <input type="text" name="extension" placeholder="" class="form-control"  value="{{$subscriber->expeir_date}}">
        </div>

        <br>
        <input type="submit" class="btn btn_custom_style" value="UPDATE" style="float:right">
    </form>
@endsection
