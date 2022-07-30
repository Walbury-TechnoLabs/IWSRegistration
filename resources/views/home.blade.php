@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Committees</p>
                    <h2>Newest Committees</h2>
                </div> 
            </div>
        </div>
        <div class="row">
            @foreach($newestCommittees as $committee)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($committee->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($committee->disciplines as $discipline)
                                <a href="{{ route('committees.index') }}?discipline={{ $discipline->id }}" class="btn_4 mr-1 mb-1">{{ $discipline->name }}</a>
                            @endforeach
                            <h4>{{ $committee->getPrice() }}</h4>
                            <a href="{{ route('committees.show', $committee->id) }}"><h3>{{ $committee->name }}</h3></a>
                            <p>{{ Str::limit($committee->description, 100) }}</p>
                            @if($committee->portfolio)
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ optional($committee->portfolio->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                        <div class="author_info_text">
                                            <p>Portfolio</p>
                                            <h5><a href="{{ route('committees.index') }}?portfolio={{ $committee->portfolio->id }}">{{ $committee->portfolio->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Portfolios</p>
                    <h2>Random Portfolios</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($randomPortfolios as $portfolio)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{ optional($portfolio->logo)->url ?? asset('img/no_image.png') }}" class="card-img-top" alt="{{ $portfolio->name }}">
                            <div class="card-body">
                                <a href="{{ route('committees.index') }}?portfolio={{ $portfolio->id }}">
                                    <h5 class="card-title">{{ $portfolio->name }}</h5>
                                </a>
                                <p>{{ Str::limit($portfolio->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection