@extends('frontend.master-frontend')
@section('content')
    
    <div class="container">
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
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
