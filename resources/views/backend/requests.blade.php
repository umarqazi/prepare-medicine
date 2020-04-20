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
        <h4 class="panel-title">Subscription Requests</h4>
    </div>
    <br><br>
    <div class="panel-body">
        @include('msg.msg')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>For</th>
                        <th>Request at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$item)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td >{{ $item->user_info->f_name }} {{ $item->user_info->s_name }}</td>
                            <td >Refugee Doctors Plan</td>
                            <td>{{ $item->created_at->format('d-m-y H:m') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#approvalModal{{ $item->id }}"
                                        style="background: #2B3069; border:none;margin-right: 4px"><i class="fa fa-check"></i></button>
                                <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{ route('subscribers_requests_reject', $item->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="approvalModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Request Approval</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('subscribers_requests_approve') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter Expire Date</label>
                                            <input type="date" class="form-control" name="expire_date" required="1">
                                        </div>
                                        <input type="submit" value="APPROVE" class="btn btn-success col-12">
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <span>{!! $data->render() !!}</span>
    </div>
</div>


@endsection
