@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>My Committe Enrollment Applications</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($userEnrollments as $enrollment)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($enrollment->committee->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($enrollment->committee->disciplines as $discipline)
                                <a href="{{ route('committees.index') }}?discipline={{ $discipline->id }}" class="btn_4 mr-1 mb-1">{{ $discipline->name }}</a>
                            @endforeach
                            <h4>{{ $enrollment->committee->getPrice() }}</h4>
                            <a href="{{ route('committees.show', $enrollment->committee->id) }}">
                            <h3>{{ $enrollment->committee->name }}</h3></a>
                            <p>{{ Str::limit($enrollment->committee->description, 100) }}</p>
                            @if($enrollment->committee->portfolio)
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ optional($enrollment->committee->portfolio->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                        <div class="author_info_text">
                                            <p>Portfolio</p>
                                            <h5><a href="{{ route('committees.index') }}?portfolio={{ $enrollment->committee->portfolio->id }}">{{ $enrollment->committee->portfolio->name }}</a></h5>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endif
                            <div class="author_info">
                                <p>Status:</p>
                                <h5>{{ App\Enrollment::STATUS_RADIO[$enrollment->status] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="float-right">
                    {{ $userEnrollments->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection