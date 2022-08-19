@extends('layouts.main')

@section('content')
    <section class="special_cource padding_top">
        <div class="container">
            <br><br>
        <!--     <div class="countdown">
    <div class="bloc-time hours" data-init-value="24">
      <span class="count-title">Hours</span>

      <div class="figure hours hours-1">
        <span class="top">2</span>
        <span class="top-back">
          <span>2</span>
        </span>
        <span class="bottom">2</span>
        <span class="bottom-back">
          <span>2</span>
        </span>
      </div>

      <div class="figure hours hours-2">
        <span class="top">4</span>
        <span class="top-back">
          <span>4</span>
        </span>
        <span class="bottom">4</span>
        <span class="bottom-back">
          <span>4</span>
        </span>
      </div>
    </div>

    <div class="bloc-time min" data-init-value="0">
      <span class="count-title">Minutes</span>

      <div class="figure min min-1">
        <span class="top">0</span>
        <span class="top-back">
          <span>0</span>
        </span>
        <span class="bottom">0</span>
        <span class="bottom-back">
          <span>0</span>
        </span>        
      </div>

      <div class="figure min min-2">
       <span class="top">0</span>
        <span class="top-back">
          <span>0</span>
        </span>
        <span class="bottom">0</span>
        <span class="bottom-back">
          <span>0</span>
        </span>
      </div>
    </div>

    <div class="bloc-time sec" data-init-value="0">
      <span class="count-title">Seconds</span>

        <div class="figure sec sec-1">
        <span class="top">0</span>
        <span class="top-back">
          <span>0</span>
        </span>
        <span class="bottom">0</span>
        <span class="bottom-back">
          <span>0</span>
        </span>          
      </div>

      <div class="figure sec sec-2">
        <span class="top">0</span>
        <span class="top-back">
          <span>0</span>
        </span>
        <span class="bottom">0</span>
        <span class="bottom-back">
          <span>0</span>
        </span>
      </div>
    </div>
  </div> -->
            <div class="row justify-content-center" >

                <div class="col-xl-5">
                                    
                    <h1 style="text-align: center;">Welcome to IWS 2022</h1>
                        <br><br>
                    <div id="wrapper" style="width:100%; text-align:center">
                    <img src="{{ asset('img/iws.png') }}">
                    </div>
                    <br><br>
            </div>
                    <div class="row">
                        <p style="font-size: 20px; font-family: 'Poppins'; color: black; text-align:center; padding-left: 3%;">
                            
                                Indore World Summit (IWS) is the Biggest Model United Nations conference of Central India.<br>
                                For years, the conference has been a place where a wide range of young students from different parts of the country gather to talk about, negotiate, and debate ways to solve the world's problems keeping the Sustainable Development Goals as the center of discussion. More than 1,500 participants assemble for three days, simulating their function as delegates to the United Nations from a certain country and acting as representatives of that country's views.
                            
                        </p>
                        <br><br><br><br>
                    </div>
            <div class="row justify-content-center">
                    <div class="section_tittle text-center">
                        <p>Our Committees</p>
                        <h2 style="text-align: center;padding-left: 2%;"> Indore World Summit 2022</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($newestCommittees as $committee)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <a href="{{ route('committees.show', $committee->id) }}">
                                <img src="{{ optional($committee->photo)->getUrl() ?? asset('img/no_image.png') }}"
                                    class="special_img" alt="">
                                <div class="special_cource_text">
                                    <h3>{{ $committee->name }}</h3>
                                    <p>{{ Str::limit($committee->description, 100) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
             <div class="row-xl-5">
                    <h1 style="text-align: -webkit-center;">OUR PARTNERS</h1>
                        <br><br>
                    <img src="{{ asset('img/AFS_logo.png') }}" style="width: 20%; margin: -5% -2% 0% 3%;" >
                    <img src="{{ asset('img/upgrad.png') }}" style="width: 20%; margin: -5% -1% 2% 7%; ">
                    <img src="{{ asset('img/dc_logo.jpg') }}" style="width: 23%; margin: -7% 2% 2% 5%; ">
                    <img src="{{ asset('img/Symbiosis_Indore.jpg') }}" style="width: 17%; margin: -9% 0% -4% 1%; ">
            </div>
        </div>
    </section>
@endsection
