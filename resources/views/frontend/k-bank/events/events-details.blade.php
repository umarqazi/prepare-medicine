@extends('frontend.master-frontend')

@section('content')
<br>

{{--  data fetch from Database !!  --}}

    <div class="container-fluid">
        <div class='page_banner_img_common'>
            <div class='overlay__'>
                <p>Image Bank</p>
            </div>
        </div>
         <!--Event Area Start-->
                <div class="event-details-area section-padding">
                    <div class="container">
                        <div class="row">
                           <div class="col-lg-9 col--12">
                                <div class="events-details-right-sidebar">
                                    <div class="events-details-img1 img-full">
                                        <h3>Learn English in ease</h3>
                                        <img alt="" src="img/event/11.jpg">
                                    </div>
                                    <div class="events-details-all">
                                        <div class="events-details-time">
                                            <div class="time-icon">
                                                <i class="zmdi zmdi-time"></i>
                                            </div>
                                            <div class="time-text">
                                                <span>Start Time</span>
                                                <p class="time-mrg">10:00 am</p>
                                                <p>Sunday,July 08,2016</p>
                                            </div>
                                        </div>
                                        <div class="events-details-time mrg-xs">
                                            <div class="time-icon">
                                                <i class="zmdi zmdi-flag"></i>
                                            </div>
                                            <div class="time-text">
                                                <span>Start Time</span>
                                                <p class="time-mrg">04:30 pm</p>
                                                <p>Monday,July 09,2016</p>
                                            </div>
                                        </div>
                                        <div class="events-details-time mrg-xs">
                                            <div class="time-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="time-text">
                                                <span>Address</span>
                                                <p class="time-mrg">10:00 am</p>
                                                <p>Monday,July 08,2016</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about-lectures">
                                        <h3>Event Description</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  t ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="content2">Event Content</h3>
                                        <ul>
                                            <li>Over 40 lectures and 60 hours of content</li>
                                            <li>Live Project End to End Software Testing Training Included</li>
                                            <li>Information packed practical training starting from basics to advanced testing techniques.</li>
                                            <li>Course content designed by considering current software testing technology and the job market.</li>
                                            <li>Best suitable for beginners to advanced level users and who learn faster when demonstrated.</li>
                                            <li>Practical assignments at the end of every session.</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="sidebar-widget">
                                    <div class="single-sidebar-widget">
                                        <h4 class="title">Categories</h4>
                                        <ul class="course-categoris">
                                            <li><a href="#">Political Science<span>10</span></a></li>
                                            <li><a href="#">Micro Biology<span>15</span></a></li>
                                            <li><a href="#">Computer Science<span>05</span></a></li>
                                            <li><a href="#">Business Leaders Guide<span>19</span></a></li>
                                            <li><a href="#">Become a Product Manage<span>21</span></a></li>
                                            <li><a href="#">Business Economics<span>14</span></a></li>
                                            <li><a href="#">Language Education<span>13</span></a></li>
                                            <li><a href="#">Social Media Management<span>18</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="single-sidebar-widget">
                                        <h4 class="title">Recent Events</h4>
                                        <div class="recent-content">
                                            <div class="recent-content-item">
                                                <a href="#"><img src="img/event/7.jpg" alt=""></a>
                                                <div class="recent-text">
                                                    <h4><a href="#">Learn English in</a></h4>
                                                    <div class="single-item-comment-view">
                                                        <span><i class="zmdi zmdi-eye"></i>59</span>
                                                        <span><i class="zmdi zmdi-comments"></i>19</span>
                                                    </div>
                                                    <p>There are many varf passages of Lorem Ipsuable,amar</p>
                                                </div>
                                            </div>
                                            <div class="recent-content-item">
                                                <a href="#"><img src="img/event/8.jpg" alt=""></a>
                                                <div class="recent-text">
                                                    <h4><a href="#">Team Works</a></h4>
                                                    <div class="single-item-comment-view">
                                                        <span><i class="zmdi zmdi-eye"></i>59</span>
                                                        <span><i class="zmdi zmdi-comments"></i>19</span>
                                                    </div>
                                                    <p>There are many varf passages of Lorem Ipsuable,amar</p>
                                                </div>
                                            </div>
                                            <div class="recent-content-item">
                                                <a href="#"><img src="img/event/9.jpg" alt=""></a>
                                                <div class="recent-text">
                                                    <h4><a href="#">Learn With Fun</a></h4>
                                                    <div class="single-item-comment-view">
                                                        <span><i class="zmdi zmdi-eye"></i>59</span>
                                                        <span><i class="zmdi zmdi-comments"></i>19</span>
                                                    </div>
                                                    <p>There are many varf passages of Lorem Ipsuable,amar</p>
                                                </div>
                                            </div>
                                            <div class="recent-content-item">
                                                <a href="#"><img src="img/event/10.jpg" alt=""></a>
                                                <div class="recent-text">
                                                    <h4><a href="#">Writing Skill</a></h4>
                                                    <div class="single-item-comment-view">
                                                        <span><i class="zmdi zmdi-eye"></i>59</span>
                                                        <span><i class="zmdi zmdi-comments"></i>19</span>
                                                    </div>
                                                    <p>There are many varf passages of Lorem Ipsuable,amar</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Event Area-->
    </div>
@endsection