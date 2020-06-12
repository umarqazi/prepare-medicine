@extends('frontend.master-frontend')

@section('content')
<br>

{{--  data fetch from Database !!  --}}

    <div class="container-fluid">
        <div class='page_banner_img_common'>
            <div class='overlay__'>
                <p>Events</p>
            </div>
        </div>
        <!--Event Area Start-->
                <div class="section-padding bg-white event-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h2 class="text-center mt-4 mb-sm-5 mb-4" style="font-size: 36px;">OUR EVENTS</h2>
                                        <p class="text-center">There are many variations of passages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-event-item event-style-2">
                                    <div class="single-event-image">
                                        <a href="{{ url('k-bank/events-details') }}">
                                            <img src="img/event/1.jpg" alt="">
                                            <span>15 Jun</span>
                                        </a>
                                    </div>
                                    <div class="single-event-text">
                                        <h3><a href="{{ url('k-bank/events-details') }}">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-time"></i>4.00 pm - 8.00 pm</span>
                                           <span><i class="zmdi zmdi-pin"></i>Dhaka Bangladesh</span>
                                       </div>
                                       <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr sarata din megla....</p>
                                       <a class="button-default" href="{{ url('k-bank/events-details') }}">LEARN Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-event-item event-style-2">
                                    <div class="single-event-image">
                                        <a href="{{ url('k-bank/events-details') }}">
                                            <img src="img/event/1.jpg" alt="">
                                            <span>15 Jun</span>
                                        </a>
                                    </div>
                                    <div class="single-event-text">
                                        <h3><a href="{{ url('k-bank/events-details') }}">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-time"></i>4.00 pm - 8.00 pm</span>
                                           <span><i class="zmdi zmdi-pin"></i>Dhaka Bangladesh</span>
                                       </div>
                                       <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr sarata din megla....</p>
                                       <a class="button-default" href="{{ url('k-bank/events-details') }}">LEARN Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-event-item event-style-2">
                                    <div class="single-event-image">
                                        <a href="{{ url('k-bank/events-details') }}">
                                            <img src="img/event/1.jpg" alt="">
                                            <span>15 Jun</span>
                                        </a>
                                    </div>
                                    <div class="single-event-text">
                                        <h3><a href="{{ url('k-bank/events-details') }}">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-time"></i>4.00 pm - 8.00 pm</span>
                                           <span><i class="zmdi zmdi-pin"></i>Dhaka Bangladesh</span>
                                       </div>
                                       <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr sarata din megla....</p>
                                       <a class="button-default" href="{{ url('k-bank/events-details') }}">LEARN Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content number">
                                    <ul class="pagination">
                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Event Area-->
    </div>
@endsection