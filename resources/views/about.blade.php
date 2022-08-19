@extends('layouts.main')

@section('content')
    <section class="special_cource padding_top">
        <div class="container">
            <br><br>
            <div class="row justify-content-center" >

                <div class="col-xl-5">
                                    
                    <h1 style="text-align: center;">ABOUT IWS</h1>
                        <br><br>
                    <div id="wrapper" style="width:100%; text-align:center">
                    <img src="{{ asset('img/iws.png') }}">
                    </div>
                    <br><br>
            </div>
                    <div class="row">
                        <p style="font-size: 20px; font-family: 'Poppins'; color: black; padding-left: 3%;">
                            
                                When the World Summits were first established, the notion was that just
thinking about ideas does not bring about change in society, but rather
speaking out about them and seeing them implemented did. Our conferences
provide our delegates with an unrivalled experience by using committees that
are extremely customised, engaging, and dynamic in nature.

<br><br>

The deliberations are framed with rational ideas and methodologies.
Muniversiti has collaborations with dozens of NGO partners, has conducted
20+ conferences, trained and catered to 40.000+ students. Muniversiti’s
conferences remain unique because we pass down the resolutions prepared
by delegates in each conference to our partnering NGOs, who possess the
skills and resources required to implement those solutions. We associate
with people working in fields ranging from gender equality to climate change
in order to ensure none of the ideas proposed by the youth goes in vain.

<br><br>

Muniversiti has had the opportunity to connect with 75,000+ students
through orientations throughout the years. A total of 5000+ attendees and
150+ institutions have been engaged with the conference thus far. It has
always been the goal of Indore World Summit to help students feel the true
fervour of being a diplomat and have an unparalleled experience of MUN. On
top of that, the conference is known for the high calibre of its speakers and
participants, who come together for three days to not only share ideas and
opinions, but also to network and gain knowledge from their peers from
different institutions. Additionally, the conference is well-known for its highquality educational modules, which are specifically designed to enhance the
delegate's overall experience. 

<br><br>

The Indore World Summit 2022 intends to smash all barriers and
welcome the delegates back with a bang following a lengthy
covid break. Muniversiti expects to host over a 1,000+ delegates
this year, drawing on the resources of more than 100 institutions
PAN India and providing orientations for more than 20,000 new
students. At a state-of-the-art location, the
conference will give delegates with the greatest possible learning experience.
                            
                        </p>
                        <br><br><br><br>
                    </div>
                    </div>
            <div class="row justify-content-center">
                    <div class="section_tittle text-center">
                        <h2 style="text-align: center;padding-left: 2%;"> IMPACT</h2>
                    </div>
                    <div id="wrapper" style="width:100%; text-align:center">
                       <img src="{{ asset('img/impact.png') }}" style="
    margin-top: -15%;
">
                    </div>

                    <div class="section_tittle text-center">
                        <h2 style="text-align: center;padding-left: 2%;"> FAQs</h2>
                    </div>
                    <div class="col-lg-12">
                        <p >
                            <details >
                              <summary>Can I register as an Individual?</summary>
                              <div class="faq__content">
                                <p style="font-size: 15px; font-family: 'Poppins'; color: black; text-align:left; padding-left: 3%;">
                                    - Yes, you can register and participate as an individual delegate. However, it is mandatory to be accompanied by a Faculty Advisor/guardian. You will be required to accept the terms and conditions that apply specifically to individual delegates upon registration.
<br><br>
However there are several advantages of registering as a delegation. Students who register as a delegation have a   higher chance of getting a better allocation and are generally allocated the same country. This helps the students to prepare better.
</p>
                              </div>
                            </details>
                            <details>
                              <summary>Can faculty advisors attend committee sessions? </summary>
                              <div class="faq__content">
                                <p style="font-size: 15px; font-family: 'Poppins'; color: black; text-align:left; padding-left: 3%;">
                                    
                                - Faculty advisors cannot participate during committee sessions however they are allowed and encouraged to be present as silent observers during the committee sessions.
                                </p>
                              </div>
                            </details>
                            <details>
                              <summary> What social events will be held during the conference? </summary>
                              <div class="faq__content">
                                <p style="font-size: 15px; font-family: 'Poppins'; color: black; text-align:left; padding-left: 3%;">- There will be two major social events held during the conference, the details for which will be announced shortly.

</p>
                              </div>
                            </details>
                        </p>
                    </div>

              
            </div>
            
             <div class="row-xl-5">
                <br><br><br>
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
