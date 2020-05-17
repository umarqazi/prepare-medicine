@extends('frontend.master-frontend')
@section('content')
<br>
    <!-- Hero Slider start -->
    <div class="hero-slider">
        {{--  Carousel Recommended Image size: 1450px width and 600px height --}}
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ url('frontend/images/slider/background-image-1.jpg') }}" class="d-block w-100" alt="..." style='width: 100%;height:100%'>
              <div class="carousel-caption d-none d-md-block" >
                <h1><span>Fast Revision </span> <br> For PLAB ONE </h1>
                <p><a href="#" class="btn slider-btn uppercase"><span>PLAB ONE</span></a></p>
              </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('frontend/images/slider/background-image-2.jpg') }}" class="d-block w-100" alt="..." style='width: 100%;height:100%'>
                <div class="carousel-caption d-none d-md-block">
                    <h1><span>Challenge </span> <br> Yourself </h1>
                    <p><a href="#" class="btn slider-btn uppercase"><span>PLAB ONE</span></a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('frontend/images/slider/background-image-3.jpg') }}" class="d-block w-100" alt="..." style='width: 100%;height:100%'>

                <div class="carousel-caption d-none d-md-block">
                    <h1><span>Attempt </span> <br> With Confidence </h1>
                    <p><a href="#" class="btn slider-btn uppercase"><span>PLAB ONE</span></a></p>
                </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    </div>
    <!-- Hero Slider end -->

    <!-- Our Course Categories Area -->
    @if(!Auth::id())
    <div class="our-course-categories-area section-ptb" id="our-subscription--plan">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <!-- section-title -->
                    <div class="section-title-three">
                        <h4>WELCOME TO PREPARE MEDICINE</h4>
                        <h3>OUR SUBSCRIPTION PLANS</h3>
                        <p class='text-justify'>We have several subscription plans to meet all budgets. These are outlined on the table below, and you will see
                            that all our plans suits all. One unique element of our service is supporting displaced medical staff who are
                            registered as such through the BMA RDI (refugee doctors’ initiative), REACHE North West or any similar
                            initiative in the UK. When you register with us, you will be asked about eligibility for this service. Our philosophy
                            in this respect is very much akin to what Helen Keller reminded us: While they were saying among themselves it
                            cannot be done, it was done. You have faced obstacles, but we will help you to make it happen. </p>
                    </div><!--// section-title -->
                </div>
            </div>



            {{-- SUCCESS MSG FOR plans--}}
            @if(session()->has('success_response'))
            <!-- Modal -->
            <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                style="display: block; padding-right: 17px;">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background: gray">
                    <h5 class="modal-title" id="exampleModalCenterTitle" style="color: #fff">Your Request Reponse</h5>
                    <button style="color: #fff" type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 class="text-center" style="padding-top: 15px; padding-bottom: 15px">{{ session()->get('success_response') }}</h5>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>

            <script>
                document.getElementById("closeModal").addEventListener("click", function(){
                    let modalX = document.getElementById("exampleModalCenter");

                    modalX.classList.remove("show");
                    modalX.style.display = 'none';
                });
            </script>
        @endif
        {{-- SUCCESS MSG FOR plans--}}

            <br>
            <div class="container plans_area">
                @if(Auth::check() && Auth::user()->role == 4)
                <h4 class='text-center'>You Are Admin</h4>
                @else
                    <div class="row" >

                        <div class="col-lg-4 col-md-6 col-sm-12 single_plan">
                            <div class="card">
                                <div class="price-header">
                                    <h3>Standard </h3>
                                </div>
                                <div class="price-content">
                                    <ul>
                                        <li>3 Months Access</li>
                                        <li>2000 Q-Bank</li>
                                        <li>30 Different Specialties</li>
                                        <li>Unlimited Random Mocks</li>
                                        <li>Unlimited Manual Mocks</li>
                                        <li>Recall Exams 2020-2017</li>
                                    </ul>
                                    <div class="price-value">
                                        <strong><sup>£</sup>14.99</strong>
                                    </div>
                                    <a href="{{ route('checkOutForm.stripe', ['Plab One', '6']) }}" class="botton-border">BUY NOW</a>
                                </div>
                            </div>
                        </div> <!-- .single_plan end here -->

                        <div class="col-lg-4 col-md-6 col-sm-12 single_plan">
                            <div class="card">
                                <div class="price-header">
                                    <h3>Advance</h3>
                                </div>
                                <div class="price-content">
                                    <ul>
                                        <li>6 Months Access</li>
                                        <li>4000 Q-Bank</li>
                                        <li>30 Different Specialties</li>
                                        <li>Unlimited Mocks</li>
                                        <li>Recall Exam 2020-2018</li>
                                        <li>Access to Notes Bank</li>
                                    </ul>
                                    <div class="price-value">
                                        <strong><sup>£</sup>24.99</strong>
                                    </div>
                                    <a href="{{ route('checkOutForm.stripe', ['Plab One', '7']) }}" class="botton-border">BUY NOW</a>
                                </div>
                            </div>
                        </div> <!-- .single_plan end here -->

                        <div class="col-lg-4 col-md-6 col-sm-12 single_plan">
                            <div class="card">
                                <div class="price-header">
                                    <h3>Professional</h3>
                                </div>
                                <div class="price-content">
                                    <ul>
                                        <li>Advance Plus</li>
                                        <li>Access to Image Bank</li>
                                        <li>Access to Video Bank</li>
                                        <li>Access to Webinar</li>
                                        <li>Access to Smart Mock</li>
                                        <li>One to One Session</li>
                                    </ul>
                                    <div class="price-value">
                                        <strong><sup>£</sup>49.99</strong>
                                    </div>
                                    <a href="{{ route('checkOutForm.stripe', ['Plab One', '8']) }}" class="botton-border">BUY NOW</a>
                                </div>
                            </div>
                        </div> <!-- .single_plan end here -->
                    </div>
                @endif
            </div>


            {{-- OLD Icon Styles
            <div class="row">
                <div class="col">
                    <div class="course-categories-wrap">
                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories malachite">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/trail.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Trial</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories sunglow">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/refugee.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Refugee Doctors</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories mariner">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/basic.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Basic</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories brilliantrose">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/standard.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Standard</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories shakespeare">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/advance.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Advance</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="coustom-col-2">
                            <!-- single-course-categories -->
                            <div class="single-course-categories deyork">
                                <div class="item-inner">
                                    <div class="cours-icon">
                                        <img src="{{ url('frontend/images/icon/professiona.png') }}" alt="">
                                    </div>
                                    <div class="cours-title">
                                        <h5>Professional</h5>
                                    </div>
                                </div>
                            </div><!--// single-course-categories -->
                        </div>

                        <div class="all-course-btn">
                            <a href="{{ route('subscription_plans', 'plab-one') }}" class="all-course">subscriptions</a>
                        </div>
                    </div>
                </div>

            </div>
            --}}

        </div>
    </div>
    @endif
    <!--// Our Course Categories Area -->


    {{-- temporary off
    <!-- Why should Education Area -->
    <div class="should-education-area section-ptb-160 should-bg" data-black-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <div class="section-title">
                        <h4>WHY PREPARE MEDICINE</h4>
                        <h3 class="text-white">Why should We</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-choose-service -->
                    <div class="single-choose-service text-center mt--30">
                        <div class="service-icon">
                            <img src="{{ url('frontend/images/icon/choos-01.png') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4>Online Revision</h4>
                            <p>Contrary to popular belief, Lorem
                                Ipsum isnotimply random text. It has roots in a pi
                                classiLatin litture from 45 BC,</p>
                        </div>
                    </div><!--// single-choose-service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-choose-service -->
                    <div class="single-choose-service text-center mt--30">
                        <div class="service-icon">
                            <img src="{{ url('frontend/images/icon/support.png') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4>Refugees Support</h4>
                            <p>Contrary to popular belief, Lorem
                                Ipsum isnotimply random text. It has roots in a pi
                                classiLatin litture from 45 BC,</p>
                        </div>
                    </div><!--// single-choose-service -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-choose-service -->
                    <div class="single-choose-service text-center mt--30">
                        <div class="service-icon">
                            <img src="{{ url('frontend/images/icon/choos-03.png') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4>Authentication</h4>
                            <p>Contrary to popular belief, Lorem
                                Ipsum isnotimply random text. It has roots in a pi
                                classiLatin litture from 45 BC,</p>
                        </div>
                    </div><!--// single-choose-service -->
                </div>
            </div>
        </div>
    </div>
    <!--// Why should Education Area -->
    --}}

    <!-- Most Popular Courses Area -->
    <div id="most_popular_courses" class="most-popular-courses-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <div class="section-title-two">
                        <h4>why choose us</h4>
                        <h3>Most Popular Courses</h3>
                    </div>
                </div>
            </div>

            <div class="row">
            @if(!$course_list->isEmpty())
                @foreach($course_list as $key=>$course)
                @if($key != 6)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-courses -->
                    <div class="single-popular-courses mt--30">
                        <div class="popular-courses-image">
                            <a href="{{ route('courseDetails.show', $course->id) }}"><img src="{{ url('storage/course/'.$course->featured_img) }}" alt=""></a>
                        </div>
                        <div class="popular-courses-contnet">
                            {{-- <h5>{{ $course->title }}</h5> --}}
                            <div class="post_meta">
                                <ul>
                                    <li><a href="{{ route('courseDetails.show', $course->id) }}">{{ $course->title }}</a></li>
                                    {{-- <li><p>Duration : {{ $course->duration }}</p></li> --}}
                                </ul>
                            </div>
                            <p class='text-justify'><?php echo str_limit($course->description, 80); ?></p>
                            <div class="button-block">
                                <a href="{{ route('subscription_plans', $course->title) }}" class="botton-border">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div><!--// single-courses -->
                </div>
                @endif
                @endforeach
            @endif


            @if(count($course_list) > 6)
                 <div class='col-12 text-center'>
                     <a href='{{ route('allCourses') }}' class='btn btn-success btn-sm' style="text-transform: uppercase; border: none; margin-top: 50px; padding: 10px 20px;">All COURSES</a>
                  </div>
            @endif
            </div>

        </div>
    </div>
    <!--// Most Popular Courses Area -->

    <!-- Free Introductory Seminar -->
    @if(!Auth::id())
    <div class="free-introductory-area section-ptb-160 free-introductory-bg" data-black-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <div class="section-title-three mt--30 mb--30">
                        <h4>How to Get Your Dream Work?</h4>
                        <h3 class="text-white">FREE TRIAL</h3>
                        <p class="text-white">You've now seen the outline of what we have to offer, so why not have a go at answering
                        some questions on free trial? This will allow you to get a feel how the website operates and the quality of our materials.We hope this encourages to subscribe
                        to one of our longer-term programmes</p>
                        <div class="free-introductory-btn">
                            <a href="{{ route('subscription_plans', 'PLAB ONE') }}" class="introductory-btn">FREE TRIAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!--// Free Introductory Seminar -->

    <!-- Our Blog Area -->
    <div class="our-blog-area section-ptb">
        <div class="container">
            <div class="col-lg-8  ml-auto mr-auto">
                <!-- section-title -->
                <div class="section-title-two">
                    <h4>OUR NOTES</h4>
                    <h3>FOR SUPER FAST REVISION</h3>
                </div><!--// section-title -->
            </div>
            <div class="row">
            @if(!$blogs->isEmpty())
            @foreach($blogs as $key=>$blog)
                @if($key != 6)
                <div class="col-lg-4  col-md-6 col-12">
                    <!-- single-courses -->
                    <div class="single-our-blog mt--30">
                        <div class="our-blog-image">
                            <a href="#"><img src="{{ url('storage/blog/'.$blog->featured_img) }}" alt=""></a>
                            <span class="in-our-blog-icon">
                                <img src="{{ url('frontend/images/icon/our-blog-01.png') }}" alt="">
                            </span>
                        </div>
                        <div class="our-blog-contnet">
                            <h5><a href="">{{ $blog->title }}</a></h5>
                            <div class="post_meta">
                                <!-- <ul>
                                    <li><p>By: <a href="#">Sekh Rana</a></p></li>
                                    <li><p>15 Fab 2018</p></li>
                                </ul> -->
                            </div>
                            <div class="text-justify">
                                <?php echo str_limit($blog->description, 110); ?>
                            </div>


                            <div class="button-block">
                                <a href="{{ route('blogDetails', $blog->id) }}" class="botton-border">Read more</a>
                            </div>
                        </div>
                    </div><!--// single-courses -->
                </div>
                @endif
            @endforeach
            @endif

            @if(count($blogs) > 6)
                 <div class='col-12 text-center'>
                     <a href='{{ route('allBlogPosts') }}' class='btn btn-success btn-sm' style="text-transform: uppercase; border: none; margin-top: 10px; padding: 10px 20px;">All Notes</a>
                  </div>
            @endif
            </div>
        </div>
    </div>
    <!-- Our Blog End -->

    <!-- Project Count Area Start -->
    <div class="project-count-area section-ptb-160 project-count-bg">
        <div class="container">

            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <!-- section-title -->
                    <div class="section-title">
                        <h4>about us</h4>
                        <h3 class="text-white">SOME IMPORTANT FACTS</h3>
                    </div><!--// section-title -->
                </div>
            </div>

            <div class="project-count-inner">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <!-- counter start -->
                                <div class="counter text-center">
                                    <h3 class="counter-active">7</h3>
                                    <p>Courses</p>
                                </div>
                                <!-- counter end -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- counter start -->
                                <div class="counter text-center">
                                    <h3 class="counter-active">6000</h3>
                                    <p>Q-Bank</p>
                                </div>
                                <!-- counter end -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- counter start -->
                                <div class="counter text-center">
                                    <h3 class="counter-active">150</h3>
                                    <p>Members</p>
                                </div>
                                <!-- counter end -->
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <!-- counter start -->
                                <div class="counter text-center">
                                    <h3 class="counter-active">18</h3>
                                    <p>Countries</p>
                                </div>
                                <!-- counter end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Count Area End -->

    <!-- Testimonials Area -->
    <div class="testimonials-area grey-bg-image section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <!-- section-title -->
                    <div class="section-title-two">
                        <h4>WORKING TOGETHER</h4>
                        <h3>OUR TEAM</h3>
                    </div><!--// section-title -->
                </div>
            </div>

            <div class="row">
                <div class="testimonial-active owl-carousel">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <!-- testimonial-wrap -->
                        <div class="testimonial-wrap text-center">
                            <div class="testimonial-image">
                                <img src="{{ url('frontend/images/testimonial/testimonial-author-1.png') }}" alt="">
                            </div>
                            <div class="testimonial-info">
                                <div class="autor-info">
                                    <h4>Dr Aziz Khan </h4>
                                    <h6>Organisational Genius</h6>
                                </div>
                                <p> PrepareMedicine.com at a time when we were furstrated with other services not quite meeting
                                    our expectations in some way. From diverse backgrounds, we found we had several things in common,
                                    and our unique skills have somehow coalesced into an entity that 'works' in no perticular order, meet the team.</p>
                            </div>
                        </div><!--// testimonial-wrap -->
                    </div>
                    <div class="col-lg-8 ml-auto mr-auto">
                        <!-- testimonial-wrap -->
                        <div class="testimonial-wrap text-center">
                            <div class="testimonial-image">
                                <img src="{{ url('frontend/images/testimonial/testimonial-author-2.png') }}" alt="">
                            </div>
                            <div class="testimonial-info">
                                <div class="autor-info">
                                    <h4>Mrs Jeanette Mccellan </h4>
                                    <h6>Q-Bank Writing Queen</h6>
                                </div>
                               <p> PrepareMedicine.com at a time when we were furstrated with other services not quite meeting
                                    our expectations in some way. From diverse backgrounds, we found we had several things in common,
                                    and our unique skills have somehow coalesced into an entity that 'works' in no perticular order, meet the team.</p>
                            </div>
                        </div><!--// testimonial-wrap -->
                    </div>
                    <div class="col-lg-8 ml-auto mr-auto">
                        <!-- testimonial-wrap -->
                        <div class="testimonial-wrap text-center">
                            <div class="testimonial-image">
                                <img src="{{ url('frontend/images/testimonial/testimonial-author-3.png') }}" alt="">
                            </div>
                            <div class="testimonial-info">
                                <div class="autor-info">
                                    <h4>Dr Salik kakar </h4>
                                    <h6>Revision Material Guru</h6>
                                </div>
                                <p> PrepareMedicine.com at a time when we were furstrated with other services not quite meeting
                                    our expectations in some way. From diverse backgrounds, we found we had several things in common,
                                    and our unique skills have somehow coalesced into an entity that 'works' in no perticular order, meet the team.</p>
                            </div>
                        </div><!--// testimonial-wrap -->
                    </div>

                    <div class="col-lg-8 ml-auto mr-auto">
                        <!-- testimonial-wrap -->
                        <div class="testimonial-wrap text-center">
                            <div class="testimonial-image">
                                <img src="{{ url('frontend/images/testimonial/testimonial-author-4.png') }}" alt="">
                            </div>
                            <div class="testimonial-info">
                                <div class="autor-info">
                                    <h4>Dr Tahir Zeb </h4>
                                    <h6>Clinical Expert</h6>
                                </div>
                                <p> PrepareMedicine.com at a time when we were furstrated with other services not quite meeting
                                    our expectations in some way. From diverse backgrounds, we found we had several things in common,
                                    and our unique skills have somehow coalesced into an entity that 'works' in no perticular order, meet the team.</p>
                            </div>
                        </div><!--// testimonial-wrap -->
                    </div>

                    <div class="col-lg-8 ml-auto mr-auto">
                        <!-- testimonial-wrap -->
                        <div class="testimonial-wrap text-center">
                            <div class="testimonial-image">
                                <img src="{{ url('frontend/images/testimonial/testimonial-author-5.png') }}" alt="">
                            </div>
                            <div class="testimonial-info">
                                <div class="autor-info">
                                    <h4>Dr Jalil Khan </h4>
                                    <h6>General Practice Specialist</h6>
                                </div>
                                <p> PrepareMedicine.com at a time when we were furstrated with other services not quite meeting
                                    our expectations in some way. From diverse backgrounds, we found we had several things in common,
                                    and our unique skills have somehow coalesced into an entity that 'works' in no perticular order, meet the team.</p>
                            </div>
                        </div><!--// testimonial-wrap -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Testimonials Area -->
    @endsection

