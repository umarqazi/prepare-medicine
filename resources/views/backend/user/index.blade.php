@extends('backend.master-backend')
@section('js-css')
    <style>
        .panel-white{
            background: white;
            padding: 10px;
        }
        .btn-left{
            float: right;
        }
        .delete{
            color: red;
            margin-left: 5px;
        }
        .edit , .delete{
            font-size: 25px;
        }
        .edit {
            cursor: pointer;
        }


        .fa-remove{
            color: #fff !important
        }

    </style>
@endsection
@section('content')

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Roles</h4>
        </div>
        <div class="panel-heading clearfix btn-left">
            <a href="{{ route('user.create') }}" class="btn btn-sencodary">Add New User</a>
        </div>
        <br><br>
        <div class="panel-body">
            @include('msg.msg')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>School</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td >{{ $user->f_name.' '.$user->s_name }}</td>
                            <td >{{ $user->email }}</td>
                            <td >{{ $user->school }}</td>
                            <td >{{ $user->country }}</td>
                            <td>
                                <a href="{{ route('blog.edit', $user->id) }}" style="background-color: #0A68D4; color: #fff; border: none;" class="btn btn-sm"><i class="fa fa-edit edit"></i></a>

                                <!-- delete code start from here -->
                                <form style="display:none;" id="delete-form-{{ $user->id }}" action="{{ route('role.destroy', $user->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                </form>

                                <button type="button" style="background-color: red; color: #fff; border: none;" class="btn btn-sm"
                                        onclick="if(confirm('Are you sure to Delete?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $user->id }}').submit();
                                            }else{
                                            event.preventDefault();
                                            }"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                                <!-- delete code end from here -->

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--            <span>{{ $users->render() }}</span>--}}
        </div>
    </div>


@endsection
