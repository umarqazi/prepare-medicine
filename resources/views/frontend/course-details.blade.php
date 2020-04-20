@extends('frontend.master-frontend')
@section('js-css')

    <style>
    	.page-heading{
		    margin-bottom: 15px;
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

    	.plans_area{
    		background: rgb(119,119,119);
			background: radial-gradient(circle, rgba(119,119,119,1) 8%, rgba(153,153,153,1) 27%, rgba(221,221,221,1) 60%, rgba(153,153,153,1) 94%);
			box-sizing: border-box;
			/*box-shadow: 0px 0px 12px 7px #777;*/
    	}
    	.plans_area .row{
    	     margin-right: 0px; 
             margin-left: 0px;
    	}
    	.plans_area .single_plan .card{
    		background: transparent !important;
    		/*margin-top: 10px*/
    	}
    	.single_plan{
    		margin-bottom: 25px;
    		text-align: center !important;
    		padding:0px;
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
    		box-sizing: border-box;
            box-shadow: 0px 0px 10px 7px #999;
            padding: 10px;
            border-radius: 5px;
            height:520px;
    	}
    	.single_plan .card .icon form{
		    position: absolute;
		    right: 17%;
		    bottom: 19%;
    	}
    	.single_plan .card .icon p{
    		position: absolute;
		    right: 16%;
		    bottom: 19%;
    	}
        .single_plan .card .icon .extra___{
            right: 17% !important;
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
       	
       	
       	@media only screen and (max-width: 767px) {
          .single_plan .card .icon form{
    		    position: absolute;
    		    right: 24%;
    		    bottom: 19%;
        	}
        	.single_plan .card .icon p{
        		position: absolute;
    		    right: 24%;
    		    bottom: 19%;
        	}
            .single_plan .card .icon .extra___{
                right: 25% !important;
            }
        }
        @media only screen and (max-width: 400px) {
          .single_plan .card .icon form{
    		    position: absolute;
    		    right: 18%;
    		    bottom: 19%;
        	}
        	.single_plan .card .icon p{
        		position: absolute;
    		    right: 18%;
    		    bottom: 19%;
        	}
            .single_plan .card .icon .extra___{
                right: 19% !important;
            }
        }
    </style>

@endsection


@section('content')
    <br>
    <div class="container">
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
            <div class='overlay__'>
                <p>Subscriptions</p>
            </div>
        </div>
        
        <h4 class="page-heading"><b>Course: </b>{{  $pageTitle }}</h4>
        <h5 class="page-sub-heading">OUR PLANS</h5>
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-6">
        		@include('msg.msg')
        	</div>
        	<div class="col-md-3"></div>
        </div>
        @if(Auth::check() && Auth::user()->role == 4)
        <h4 class='text-center'>You Are Admin</h4>
        @else
        <div class="plans_area">
        	<div class="row">
	        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	        		<div class="card">
						  <div class="icon">
						  	<img src="{{ asset('frontend/images/plans/1.png') }}" alt="">
						  	<form action="{{ route('subscription_non_payalble') }}" method="POST">
					    		@csrf
					    		<input type="hidden" name="plan" value="trail">
					    		<button onclick="return confirm('Are you sure?')" type="submit" class="subscribe_button_one btn btn-success btn-sm subscribe_button">BUY NOW</button>
					    	</form>
						  </div>
					</div>
	        	</div> <!-- .single_plan end here -->

	        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	        		<div class="card">
					  <div class="icon">
					  	<img src="{{ url('frontend/images/plans/2.png') }}" alt="">
					  	<form action="{{ route('subscription_non_payalble') }}" method="POST">
				    		@csrf
				    		<input type="hidden" name="plan" value="refugees_doctors">
				    		<button onclick="return confirm('Are you sure?')" type="submit" class="subscribe_button_two btn btn-success btn-sm subscribe_button">BUY NOW</button>
				    	</form>
					  </div>
					</div>
	        	</div> <!-- .single_plan end here -->

	        	<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	        		<div class="card">
					  <div class="icon">
					  	<img src="{{ url('frontend/images/plans/3.png') }}" alt="">
					  	<p><a href="{{ route('checkOutForm.stripe', [$pageTitle, '5']) }}" class="subscribe_button_three btn btn-success btn-sm subscribe_button extra_btn">BUY NOW</a></p>
					  </div>
					</div>
	        	</div> 

	    		<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	    			<div class="card">
					  <div class="icon">
					  	<img src="{{ url('frontend/images/plans/4.png') }}" alt="">
					  	<p class="extra___"><a href="{{ route('checkOutForm.stripe', [$pageTitle, '6']) }}" class="subscribe_button_one btn btn-success btn-sm subscribe_button">BUY NOW</a></p>
					  </div>
					</div>
	    		</div> <!-- .single_plan end here -->

	    		<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	    			<div class="card">
					  <div class="icon">
					  	<img src="{{ url('frontend/images/plans/5.png') }}" alt="">
					  	<p><a href="{{ route('checkOutForm.stripe', [$pageTitle, '7']) }}" class="subscribe_button_two btn btn-success btn-sm subscribe_button">BUY NOW</a></p>
					  </div>
					</div>
	    		</div> <!-- .single_plan end here -->

	    		<div class="col-lg-4 col-md-6 col-sm-12 single_plan">
	    			<div class="card">
					  <div class="icon">
					  	<img src="{{ url('frontend/images/plans/6.png') }}" alt="">
					  	<p><a href="{{ route('checkOutForm.stripe', [$pageTitle, '8']) }}" class="subscribe_button_three btn btn-success btn-sm subscribe_button">BUY NOW</a></p>
					  </div>
					</div>
	    		</div> <!-- .single_plan end here -->
	    	</div>
        </div>
        @endif




    </div>
    <br>
    	@if(session()->has('success_response'))
			<!-- Modal -->
			<div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
				style="display: block; padding-right: 17px;">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header" style="background: gray">
			        <h5 class="modal-title" id="exampleModalCenterTitle" style="color: #fff">Your Request Response</h5>
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
@endsection