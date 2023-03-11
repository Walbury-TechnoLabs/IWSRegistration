@extends('layouts.main')

@section('content')

<section class="committee_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 committee_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{ optional($committee->photo)->getUrl() ?? asset('img/no_image.png') }}" alt="">
                </div>
                <div class="content_wrapper">
                    <h4 class="title_top">Description</h4>
                    <div class="content">
                        {{ $committee->description ?? 'No description provided' }}
                    </div>
                    <h4 class="title_top">AGENDA</h4>
                    <div class="content">
                        {{ $committee->agenda ?? 'No Agenda provided' }}
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <!--<div class="sidebar_top">-->
                <!--    <a href="{{ route('enroll.create', $committee->id) }}" class="btn_1 d-block">Enroll the committee</a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</section>
@endsection