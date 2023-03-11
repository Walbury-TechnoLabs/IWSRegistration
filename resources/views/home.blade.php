@extends('layouts.main')

@section('content')
    <section class="special_cource padding_top">
        <div class="container">
            <br><br>
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
                            
                                Indore World Summit (IWS) is the Biggest High School Leadership Conference of India.<br>
                                For years, the conference has been a place where a wide range of young students from different parts of the country gather to talk about, negotiate, and debate ways to solve the world's problems keeping the Sustainable Development Goals as the center of discussion. More than 1,500 participants assemble for three days, simulating their function as delegates to the United Nations from a certain country and acting as representatives of that country's views.
                            
                        </p>
                        <br><br><br><br>
                    </div>
                    
                    <div class="row justify-content-center" >

                    <div class="col-xl-5">
                                    
                    <h1 style="text-align: center;">SKILLS YOU WILL LEARN</h1>
                        <br><br>
                    </div>
                        <p style="font-size: 18px; font-family: 'Poppins'; color: black; padding-left: 5%;">
                            The Indore World Summit is a one-stop mega-conclave that will assist
students acquire, adapt, and utilise life-enhancing skills.
                                <br><br>
                        </p>
                    <div id="wrapper" style="width:100%; text-align:center">
                    <img src="{{ asset('img/skills.png') }}">
                    </div>
                    <div class="col-xl-5">
                    <h1 style="text-align: center;">BENEFITS OF ATTENDING</h1>
                    <br><br>
                    </div>
                    <div class="col-lg-12">
                        <p style="font-size: 18px; font-family: 'Poppins'; color: black; padding-left: 3%;">
                            Indore World Summit aims to identify, promote and connect India’s most
                                impactful young leaders to create a better world, with more responsible, more
                                effective leadership. Here's what makes it the global forum for young leaders:
                                <br><br>
                        <ul style="font-size: 18px; font-family: 'Poppins'; color: black; padding-left: 10%; padding-bottom: 5%;">
                            <li style=" list-style-type: disclosure-closed;">
                                <b> Action-Oriented: </b>
                                <p style="padding-left: 2%;font-size: medium;color: black;">
                                    The Indore World Summit wants to inspire
                                    and celebrate changemakers. It's not just a
                                    'talking shop'- the focus is on concrete
                                    action. 

                                </p>
                            </li>
                            <li style=" list-style-type: disclosure-closed;">

                                <b>Diverse Community:</b>
                                <p style="padding-left: 2%;font-size: medium;color: black;">
                                    The Indore World Summit aims to have a
                                    diverse community of students from across
                                    the country who want to bring a change in
                                    the world.
                                </p>
                            </li>
                            <li style=" list-style-type: disclosure-closed;">
                                <b>Opportunities for all:</b>
                                <p style="padding-left: 2%;font-size: medium;color: black;">
                                    Students from different cultures and
                                    backgrounds come together to resolve the
                                    biggest problems faced by our world.
                                </p>
                            </li>
                            <li style=" list-style-type: disclosure-closed;">
                                <b>Mentorship:</b>
                                <p style="padding-left: 2%;font-size: medium;color: black;">
                                    The Indore World Summit is set apart
                                    through the interaction it facilitates between
                                    the world’s most well renowned leaders,
                                    speakers, and the young leaders -
                                    yourselves.
                                </p>
                            </li>
                            <li style=" list-style-type: disclosure-closed;">
                                <b>Your voice matters</b>
                                <p style="padding-left: 2%;font-size: medium;color: black;">
                                    The Indore World Summit is one of the
                                    global forums that is designed by young
                                    leaders for young leaders, ensuring that
                                    young people have the opportunity to devise
                                    solutions to the topics they care about
                                    most.
                                </p>
                            </li>

                        </ul>
                        
</p>
                    </div>
                    
                    <br><br>
            </div>
        


                    
                    
            <div class="row justify-content-center">
                    <div class="section_tittle text-center">
                        
                        <h2 style="text-align: center;padding-left: 2%;"> OUR COMMITTEES</h2><br><br>
                        <p><span> <a href="./public/Terms and Conditions.pdf"><b>Terms and Conditions</b></a> </p></span>
                        <p style="font-size: 15px; font-family: 'Poppins'; color: black; text-align:center; padding-left: 3%;">
                             <b>Click here to view the AGENDAS.</b>
                             </p>
                             
                         <a class="btn_1" href="/agenda">AGENDAS</a>
                         
                         
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
                                    <!--<a target = "_blank" class="btn_4 mr-1 mb-1" href="./public/{{ $committee->name }}.pdf">Study Guide</a>-->
                                    <p>{{ Str::limit($committee->description, 100) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
             <div class="row-xl-5">
                    <h1 style="text-align: -webkit-center; margin-top: revert;">Gallery</h1>
                        <br><br>

                    <div class="grid">
  <div class="item" style="background-image: url(https://iws.muniversiti.org/public/img/Gallery1.jpg)"></div>
  
  <div class="item" style="background-image: url(https://iws.muniversiti.org/public/img/Gallery2.jpg)"></div>
  
  <div class="item" style="background-image: url(https://iws.muniversiti.org/public/img/Gallery3.jpg)"></div>
  
  <div class="item" style="background-image: url(https://iws.muniversiti.org/public/img/Gallery5.jpg)"></div>
  
  <div class="item" style="background-image: url(https://iws.muniversiti.org/public/img/Gallery4.jpg)"></div>
</div>
            </div>
            
             <div class="row-xl-5">
                    <h1 style="text-align: -webkit-center; margin-top: revert;">OUR PARTNERS</h1>
                        <br><br>
                    <img src="{{ asset('img/AFS_logo.png') }}" style="width: 15%;margin: -5% -2% 0% 3%;">
                    <img src="{{ asset('img/upgrad.png') }}" style="width: 15%;margin: -5% -1% 2% 7%;">
                    <img src="{{ asset('img/HPAIR.png') }}" style="width: 15%;margin: -3% -1% 2% 5%;">
                    <img src="{{ asset('img/dc_logo.jpg') }}" style="width: 19%;margin: -7% 1% 1% 3%;">
                    <img src="{{ asset('img/Symbiosis_Indore.jpg') }}" style="width: 10%;margin: -12% 0% -4% 1%;">
                    <br>
                    <img src="{{ asset('img/INIFD.png') }}" style="width: 14%;margin: -3% -1% 0% 5%;">
                    <img src="{{ asset('img/Sherringwood.png') }}" style="width: 15%;margin: -3% -1% 2% 7%;">
                    <img src="{{ asset('img/iist.png') }}" style="width: 15%;margin: -1% -1% 2% 5%;">
                    <img src="{{ asset('img/Index.png') }}" style="width: 12%;margin: -3% 3% 1% 6%;">
                    <img src="{{ asset('img/Nayan.jpg') }}" style="width: 15%;margin: -10% 0% -4% 0%;">
                    <br>
                    <img src="{{ asset('img/Acropolis.jfif') }}" style="width: 14%;margin: -3% -1% 0% 5%;">
                    <img src="{{ asset('img/DCBM.png') }}" style="width: 16%;margin: -3% -1% 2% 7%;">
                    <img src="{{ asset('img/Emerald.jpg') }}" style="width: 12%;margin: -1% 1% 3% 7%;">
                    <img src="{{ asset('img/Upnishad.png') }}" style="width: 12%;margin: -3% 3% 1% 6%;">
                    <img src="{{ asset('img/Decathalon.png') }}" style="width: 15%;margin: -10% 0% -4% 0%;">
                    <br>
                    <img src="{{ asset('img/Teeshirtwala.png') }}" style="width: 10%;margin: -3% -1% 0% 9%;">
                    <img src="{{ asset('img/IPS.jpeg') }}" style="width: 11%;margin: -2% -1% 2% 10%;">
                    <img src="{{ asset('img/Shridhee.png') }}" style="width: 11%;margin: -1% 1% 3% 7%;">
                    <img src="{{ asset('img/SR25.png') }}" style="width: 12%;margin: -3% 5% 1% 6%;">
                    <img src="{{ asset('img/Hotel.jpeg') }}" style="width: 15%;margin: -10% 0% -4% 0%;">
                    
            </div>
            <div class="row-xl-5">
                    <h1 style="text-align: -webkit-center; margin-top: revert;">PREVIOUS PARTNERS AND COLLABORATIONS</h1>
                        <br><br>
            </div>
                    <div id="wrapper" style="width:100%; text-align:center;">
                    <img src="{{ asset('img/previous_partner2.png') }}">
                    <img src="{{ asset('img/previous_partner1.png') }}" style="
    padding: 2%;
">
                    <img src="{{ asset('img/previous_partner3.png') }}">
                    <img src="{{ asset('img/previous_partner4.png') }}" style="
    padding: 2%;
">

                    </div>
        </div>
    </section>
@endsection
