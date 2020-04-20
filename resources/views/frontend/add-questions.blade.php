@extends('frontend.master-frontend')
@section('content')


{{--  data fetch from Database !!  --}}

    <div class="container">
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
            <div class='overlay__'>
                <p>Plab Community Add Question</p>
            </div>
        </div>
        
        <h2 class="text-center" style="font-size: 25px;text-align: center;">
            Add Questions to Plab Community
        </h2>
        
        <div class="col-sm-12">
            <p class="text-justify">
                This is your chance to share ideas for questions or indeed questions you may remember from sitting the exam. If you click on the link below, it will open up a text section for question, answer selection and rationale / explanation and hints. Even if it is a basic draft or a partial question, please share and our question developers will build it up into a full question.
            </p>
        </div>
        <br>
        {{-- <div class="row" style="float:right;">
            <div style="margin-right:5px;">
                <a href="{{ url('user/question/single/'.Auth::user()->id) }}" class="btn btn-spinner col-12 bg-info">View Single Question</a>
            </div>
            <div style="margin-left:5px;">
                <a href="{{ url('user/question/multi/'.Auth::user()->id) }}" class="btn btn-spinner col-12 bg-info">View Multichoice Question</a>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ url('user/question/add/single') }}" class="btn btn-spinner col-12">Add Question</a>
            </div>
            <div class="col-sm-6">
                <a href="{{ url('user/question/add/multi') }}" class="btn btn-spinner col-12">Add Multichoice Question</a>
            </div>
        </div> --}}
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <a href="{{ url('user/question/add/single') }}" class="btn btn-spinner col-12" style="
                        background: green;
                        text-transform: uppercase;
                        border-radius: 5px;
                        box-sizing: border-box;
                        box-shadow: 0px 0px 20px 0px #444;
                    ">Add Question</a>
                </div>
            </div>
    </div>



<br>
@endsection
