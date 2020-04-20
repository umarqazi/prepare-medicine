@extends('frontend.master-frontend')
@section('js-css')
    <style type="text/css">
        p{
        	text-align: justify;
        }
        h4{
        	margin-top: 30px;
        	border-bottom: 1px solid #ddd
        }

        ul{
        	display: block;
        	list-style-type: square;
        	margin-left: 25px;
        }

        .heading_{border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 30px;
            text-align: center;
        }

    </style>
@endsection

@section('content')
    <br>
    <div class="container">
        <h3 class="heading_">{{ $data->title }}</h3>

        <div class="text-center" style="margin-bottom: 30px"> 
            <img src="{{ url('storage/blog/'.$data->featured_img) }}">
        </div>

        <?php echo $data->description; ?>
    </div>  
    <br><br>
@endsection
