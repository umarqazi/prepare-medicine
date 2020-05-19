@extends('frontend.master-frontend')

@section('content')
<br>
<!--Gallery Area Start-->
<div class="container-fluid">
        <div class='page_banner_img_common'>
            <div class='overlay__'>
                <p>Video Bank</p>
            </div>
        </div>
<div class="gallery-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <!--Single Gallery Image Start-->
            <div class="col-md-4 col-sm-6">
                <div class="single-gallery-img mb-30">
                    <a href="{{ url('i-bank/video-bank-gallery-detail') }}" ><img src="{{asset('frontend/images/gallery/gallery1.jpg')}}" alt="">
                <div class="d-flex align-items-center justify-content-center video-overlay">
                    <button class="btn btn-success">View Course Details</button>
                </div>
                </a>
                </div>
            </div>
            <!--Single Gallery Image End-->
            
        </div>
    </div>
</div>
<!--Gallery Area End-->
</div>
@endsection