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

    <div class="alert alert-info" role="alert">Create New User</div>
    @include('msg.msg')

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label><b>User First Name</b></label>
            <input id="title" type="text" name="first_name" placeholder="Enter First Name..." class="form-control">
        </div>

        <div class="form-group">
            <label><b>User Second Name</b></label>
            <input id="title" type="text" name="second_name" placeholder="Enter Second Name..." class="form-control">
        </div>

        <div class="form-group">
            <label><b>Email</b></label>
            <input type="text" name="email" placeholder="Enter Email..." class="form-control">
        </div>

        <div class="form-group">
            <label><b>School Name</b></label>
            <input id="title" type="text" name="school_name" placeholder="Enter School Name..." class="form-control">
        </div>

        <div class="form-group">
            <label><b>Gender</b></label>
            <input id="title" type="text" name="gender" placeholder="Enter Gender..." class="form-control">
        </div>

        <div class="form-group">
            <label><b>Country</b></label>
            <div>
                <select class="form-control" name="country">
                    <option>Select A Country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label><b>Role</b></label>
            <div>
                <select class="form-control" name="country">
                    <option>Select A Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <input type="submit" class="btn btn_custom_style" value="CREATE" style="float:right">
    </form>

@endsection
