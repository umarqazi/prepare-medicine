@extends('frontend.master-frontend')
@section('content')
    <div class="container-fluid" style="padding-left: 30px; padding-right: 30px">
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
            <div class='overlay__'>
                <p>Our Team</p>
            </div>
        </div>
        
        {{--  data fetch from Database !!  --}}
        {!! $data !!}

    </div>
    <br>
@endsection
