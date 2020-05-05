@extends('backend.master-backend')
@section('js-css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


        .btn_custom_style{
            background-color: #ddd;
            color: #000
        }

    </style>

@endsection
@section('content')
<br>

<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Subscriber List</h4>
        
        <div class='table-responsive'> 
            <table class='table text-center'>
                <thead style='background:#ddd'>
                    <tr>
                        <th>Total</th>
                        <th>Trial</th>
                        <th>Refugees</th>
                        <th>Basic</th>
                        <th>Standard</th>
                        <th>Advanced</th>
                        <th>Professional</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td>{{ count($data) }}</td>
                        <td>{{ $total_trail }}</td>
                        <td>{{ $total_refugees }}</td>
                        <td>{{ $total_basic }}</td>
                        <td>{{ $total_standard }}</td>
                        <td>{{ $total_advanced }}</td>
                        <td>{{ $total_professional }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>ID</th>
                        <th>Plan</th>
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$item)
                        <tr>
                            <th scope="row">{{ $key++ }}</th>
                            <td>{{ $item->f_name }} {{ $item->s_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->customer_id }}</td>
                            <td>
                                @if($item->role == 2)
                                    {{ 'Trail' }}
                                @elseif($item->role == 3)
                                    {{ 'Refugees Doctors' }}
                                @elseif($item->role == 5)
                                    {{ 'Basic' }}
                                @elseif($item->role == 6)
                                    {{ 'Standard' }}
                                @elseif($item->role == 7)
                                    {{ 'Advance' }}
                                 @elseif($item->role == 8)
                                    {{ 'Professional' }}
                                @else
                                    {{ 'Wrong' }}
                                @endif
                            </td>
                            <td>
                                {{  date('d F Y', strtotime($item->expeir_date)) }}
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#detailsModal{{ $item->id }}"><i class="fa fa-eye eye"></i></a>
                                <!-- Modal -->
                        <div class="modal fade" id="detailsModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Detials</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $item->f_name }} {{ $item->s_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $item->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Plan</th>
                                                <td>
                                                    @if($item->role == 2)
                                                        {{ 'Trail' }}
                                                    @elseif($item->role == 3)
                                                        {{ 'Refugees Doctors' }}
                                                    @elseif($item->role == 5)
                                                        {{ 'Basic' }}
                                                    @elseif($item->role == 6)
                                                        {{ 'Standard' }}
                                                    @elseif($item->role == 7)
                                                        {{ 'Advance' }}
                                                     @elseif($item->role == 8)
                                                        {{ 'Professional' }}
                                                    @else
                                                        {{ 'Wrong' }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($item->role != 2 && $item->role != 3)
                                            <tr>
                                                <th>Customer ID</th>
                                                <td>{{  $item->customer_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <td>{{  $item->trxID }}</td>
                                            </tr>
                                            <tr>
                                                <th>Paid Amount</th>
                                                <td>{{  $item->amount_paid }}</td>
                                            </tr>
                                            <tr>
                                                <th>Subscribe at</th>
                                                <td>{{  date('d F Y', strtotime($item->paid_at)) }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Expire Date</th>
                                                <td>{{  date('d F Y', strtotime($item->expeir_date)) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                            </td>
                        </tr>

                        

                    @endforeach
                </tbody>
            </table>
        </div>
        <span>{!! $data->render() !!}</span>
    </div>
</div>


@endsection
@section('js')

@endsection
