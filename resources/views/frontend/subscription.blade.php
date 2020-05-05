@extends('frontend.master-frontend')
@section('js-css')

    <style>
    	.page-heading{
		    margin-bottom: 70px;
		    border-bottom: 1px solid #ddd;
		    padding-bottom: 10px;
    	}
    	.page-sub-heading{
    		text-align: center;
		    font-weight: bold;
		    border: 2px solid #ddd;
		    background: #2C3069;
		    padding: 15px 0;
		    margin-bottom: 20px;
		    color: #fff;
    	}

    	.bg_color{
    		background: rgb(119,119,119);
			background: radial-gradient(circle, rgba(119,119,119,1) 8%, rgba(153,153,153,1) 27%, rgba(221,221,221,1) 60%, rgba(153,153,153,1) 94%);
			padding-top: 35px
    	}
    	.bg_color .single_plan .card{
    		background: transparent !important;
    	}
    	.single_plan{
    		margin-bottom: 100px;
    		text-align: center !important;
    	}
    	.single_plan .card{
    		border: none;
    	}
    	.single_plan .card .icon{
    		padding: 0px;
		    text-align: center;
		    position: relative;
    	}

    	.single_plan .card .icon img{
    		
    	}
    	.single_plan .card .icon p{
    		position: absolute;
		    right: 12%;
		    bottom: 18%;
    	}

    	.single_plan .subscribe_button_one{
    		background: rgb(254,199,61);
			background: -moz-linear-gradient(90deg, rgba(254,199,61,1) 15%, rgba(251,167,53,1) 45%, rgba(221,221,221,1) 92%);
			background: -webkit-linear-gradient(90deg, rgba(254,199,61,1) 15%, rgba(251,167,53,1) 45%, rgba(221,221,221,1) 92%);
			background: linear-gradient(90deg, rgba(254,199,61,1) 15%, rgba(251,167,53,1) 45%, rgba(221,221,221,1) 92%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#fec73d",endColorstr="#dddddd",GradientType=1);
    	}
    	.single_plan .subscribe_button_two{
    		background: rgb(57,193,81);
			background: -moz-linear-gradient(90deg, rgba(57,193,81,1) 15%, rgba(39,186,84,1) 45%, rgba(221,221,221,1) 92%);
			background: -webkit-linear-gradient(90deg, rgba(57,193,81,1) 15%, rgba(39,186,84,1) 45%, rgba(221,221,221,1) 92%);
			background: linear-gradient(90deg, rgba(57,193,81,1) 15%, rgba(39,186,84,1) 45%, rgba(221,221,221,1) 92%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#39c151",endColorstr="#dddddd",GradientType=1);
    	}
    	.single_plan .subscribe_button_three{
    		background: rgb(0,145,231);
			background: -moz-linear-gradient(90deg, rgba(0,145,231,1) 15%, rgba(221,221,221,1) 45%, rgba(0,184,234,1) 92%);
			background: -webkit-linear-gradient(90deg, rgba(0,145,231,1) 15%, rgba(221,221,221,1) 45%, rgba(0,184,234,1) 92%);
			background: linear-gradient(90deg, rgba(0,145,231,1) 15%, rgba(221,221,221,1) 45%, rgba(0,184,234,1) 92%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#0091e7",endColorstr="#00b8ea",GradientType=1);
    	}

       .single_plan .subscribe_button{
		    border-radius: 3px !important;
		    font-weight: normal;
		    border: none;
		    padding: 3px 5px
       	}
       	.single_plan .subscribe_button:hover{
       		box-shadow: 1px 4px 7px 2px #777;
       		transform: scale(1.1);
       		transition: .5s
       	}
       	.single_plan .extra_btn{
       		right: 14%;
       	}

       	.upgrade_button{
       		width: 100%
       	}
    </style>

@endsection


@section('content')
<br>
    
    <div class="container">
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
            <div class='overlay__'>
                <p>My Subscription</p>
            </div>
        </div>
        
        <h5 class="page-sub-heading">Your Current Plan</h5>
        <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		@include('msg.msg')
        	</div>
        	<div class="col-md-2"></div>
        </div>

        @if(Auth::user()->role == 1)
        <div class="row">
            <div class='col-md-4'></div>
        	<div class="col-md-4">
    			<h6 style="text-align: center; display: block;">{{ 'You have no Subscription Plan' }}</h6>
		    	<div style="margin-top: 25px" class="text-center"><a href="{{ route('root_page') }}#most_popular_courses" class="btn btn-success btn-sm upgrade_button">UPGRADE PLAN NOW</a></div>
    		</div>
    		<div class='col-md-4'></div>
        </div>
        @endif

        
        @if(Auth::user()->role >= 2)
        <div class="row bg_color">
            
        	<div class="col-lg-6 col-md-6 col-sm-12">
        		<div class="plna_status">
                	<h6 class="text-center" style="margin-bottom: 10px"><b>PLAN STATUS</b></h6>
                    <table class="table">
                        <tbody>
                            <tr>
                               
                                
                                    <th>Your Subscription Plan</th>
                                    <td>
                                        @if(Auth::user()->role == 2)
                                            {{ 'Trial' }}
                                        @elseif(Auth::user()->role == 3)
                                            {{ 'Refugees Doctors' }}
                                        @elseif(Auth::user()->role == 5)
                                            {{ 'Basic' }}
                                        @elseif(Auth::user()->role == 6)
                                            {{ 'Standard' }}
                                        @elseif(Auth::user()->role == 7)
                                            {{ 'Advance' }}
                                        @elseif(Auth::user()->role == 8)
                                            {{ 'Professional' }}
                                        @else
                                            {{ 'Something wrong' }}
                                        @endif
                                    </td>
                                    
                                
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>
                                        @if(Auth::user()->expeir_date < date('Y-m-d'))
                                            <span style="color: red">{{ 'Expired' }}</span>
                                            @else
                                            <span style="color: green">{{ 'Active' }}</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>Expired Date</th>
                                    <th>{{ date('d F Y', strtotime(Auth::user()->expeir_date)) }}</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a class="upgrade_button btn btn-sm" href="{{ route('root_page') }}#most_popular_courses">UPGRADE PLAN</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

        	</div>
        	@if(Auth::user()->role == 2)
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
        		<div class="card">
					  <div class="icon">
					  	<img src="{{ asset('frontend/images/plans/1.png') }}" alt="">
					  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_one btn btn-success btn-sm subscribe_button">UPGRADE</a></p>
					  </div>
				</div>
        	</div> <!-- .single_plan end here -->

        	@elseif(Auth::user()->role == 3)
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
        		<div class="card">
				  <div class="icon">
				  	<img src="{{ url('frontend/images/plans/2.png') }}" alt="">
				  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_two btn btn-success btn-sm subscribe_button ">UPGRADE</a></p>
				  </div>
				</div>
        	</div> <!-- .single_plan end here -->

        	@elseif(Auth::user()->role == 5)
        	
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
        		<div class="card">
				  <div class="icon">
				  	<img src="{{ url('frontend/images/plans/3.png') }}" alt="">
				  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_three btn btn-success btn-sm subscribe_button extra_btn">UPGRADE</a></p>
				  </div>
				</div>
        	</div>

        	@elseif(Auth::user()->role == 6)
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
    			<div class="card">
				  <div class="icon">
				  	<img src="{{ url('frontend/images/plans/4.png') }}" alt="">
				  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_one btn btn-success btn-sm subscribe_button">UPGRADE</a></p>
				  </div>
				</div>
    		</div> <!-- .single_plan end here -->

        	@elseif(Auth::user()->role == 7)
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
    			<div class="card">
				  <div class="icon">
				  	<img src="{{ url('frontend/images/plans/5.png') }}" alt="">
				  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_two btn btn-success btn-sm subscribe_button">UPGRADE</a></p>
				  </div>
				</div>
    		</div> <!-- .single_plan end here -->
        	@elseif(Auth::user()->role == 8)
        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
    			<div class="card">
				  <div class="icon">
				  	<img src="{{ url('frontend/images/plans/6.png') }}" alt="">
				  	<p><a href="{{ route('root_page') }}#most_popular_courses" class="subscribe_button_three btn btn-success btn-sm subscribe_button">UPGRADE</a></p>
				  </div>
				</div>
    		</div> <!-- .single_plan end here -->
        	@endif
        </div> <!-- .row end here -->
        
        @endif
    </div>
    <br>
@endsection