@extends('frontend.master-frontend')

@section('content')
<br>
<!--Gallery Area Start-->
<div class="container-fluid">
        <div class='page_banner_img_common'>
            <div class='overlay__'>
                <p>Image Bank</p>
            </div>
        </div>
<div class="gallery-area pt-100 pb-70">
                    <div class="container">
                        <div class="row">
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery1.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery1.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery2.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery2.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery3.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery3.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery4.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery4.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery5.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery5.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery6.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery6.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery7.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery7.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery8.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery8.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                            <!--Single Gallery Image Start-->
                            <div class="col-md-4 col-sm-6">
                                <div class="single-gallery-img mb-30">
                                    <a href="{{asset('frontend/images/gallery/gallery9.jpg')}}" data-fancybox="images"><img src="{{asset('frontend/images/gallery/gallery9.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Single Gallery Image End-->
                        </div>
                    </div>
                </div>
                <!--Gallery Area End-->
</div>
                @endsection