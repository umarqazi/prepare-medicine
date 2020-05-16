@extends('frontend.master-frontend')
@section('content')
<br>
    
    <div class="container-fluid">
        <div class='page_banner_img_common'>
            </div>
            <div class='overlay__'>
                <p>Plab One</p>
            </div>
        </div>
        
        {{--  data fetch from Database !!  --}}
        {!! $data !!}

    </div>
    <br>
@endsection
