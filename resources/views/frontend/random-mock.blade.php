@extends('frontend.master-frontend')
@section('content')
    {{--  data fetch from Database !!  --}}

    <div class="container-fluid" style="padding-left: 30px; padding-right: 30px"> 
        <div class='page_banner_img_common'>
            <img src='/frontend/images/pages-banner.png' class='img-fluid'>
            <div class='overlay__'>
                <p>Random Mock </p>
            </div>
        </div>
        <h2 style="font-size: 25px;text-align: center;">RANDOM MOCKS</h2>
        <p style="text-align: justify;">
               Your opportunity to test yourself on randomly generated full simulation of the GMC PlAB-1 Exam, which timed 3:00 hours for 180 MCQs.
        <br>
               These are timed, random mock exams using a selection of questions from our extensive Q Bank. You may find you have answered a question previously, but it is likely that many are new to you. This gives you the chance to time yourself to exam conditions for the PLAB 1
        </p>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
    
        @endif
        
       <div class="row" style="padding-left: 35px; padding-right: 35px">
            @foreach ($expired_data as $key => $item)
                @if ($key%4 == '0')
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                            <a href="{{ url('q-bank/random/exam/'.$item->id) }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden;background-color: #2C3069">
                                <img src="{{ url('storage/photos/mock/random-mock/general-icons.png') }}" alt="" style="width:35%;float:left;height:55px;">
                                <span style="margin-top:17px">MOCK {{ $key+1 }}</span>
                            </a>
                        </div>
                    @elseif($key%3 == '0')
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                            <a href="{{ url('q-bank/random/exam/'.$item->id) }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden;background-color: #2C3069">
                                <img src="{{ url('storage/photos/mock/random-mock/general-icons.png') }}" alt="" style="width:35%;float:left;height:55px;">
                                <span style="margin-top:17px">MOCk {{ $key+1 }}</span>
                            </a>
                        </div>
                    @elseif($key%2 == '0')
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                            <a href="{{ url('q-bank/random/exam/'.$item->id) }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden;background-color: #2C3069">
                                <img src="{{ url('storage/photos/mock/random-mock/general-icons.png') }}" alt="" style="width:35%;float:left;height:55px;">
                                <span style="margin-top:17px">MOCK {{ $key+1 }}</span>
                            </a>
                        </div>
                    @else
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                            <a href="{{ url('q-bank/random/exam/'.$item->id) }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden;background-color: #2C3069">
                                <img src="{{ url('storage/photos/mock/random-mock/general-icons.png') }}" alt="" style="width:35%;float:left;height:55px;">
                                <span style="margin-top:17px">MOCK {{ $key+1 }}</span>
                            </a>
                        </div>
                @endif
            @endforeach
            @if($exists_data != '0')
                @foreach ($continue_data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                        <a href="{{ url('q-bank/random/exam/'.$item->id) }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden">
                            <img src="{{ url('storage/photos/mock/random-mock/continue-mock.png') }}" alt="" style="width:35%;float:left;height:55px;">
                            <span style="margin-top:17px">{{ 'Continue Mock' }}</span>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <a href="{{ url('q-bank/random') }}" class="btn btn-spinner col-12 p-0" style="padding:0;border-radius:10px;overflow:hidden">
                        <img src="{{ url('storage/photos/mock/random-mock/new-mock.png') }}" alt="" style="width:35%;float:left;height:55px;">
                        <span style="margin-top:17px">{{ 'New Mock' }}</span>
                    </a>
                </div>
            @endif
        </div>
     </div>
 
    <br>

@endsection
