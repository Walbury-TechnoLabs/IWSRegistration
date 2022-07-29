@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Committees</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($committees as $committe)
                <div class="col-sm-6 col-lg-4 mb-3">
                    <div class="single_special_cource">
                        <img src="{{ optional($committe->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($committe->disciplines as $discipline)
                                <a href="{{ route('committees.index') }}?discipline={{ $discipline->id }}" class="btn_4 mr-1 mb-1">{{ $discipline->name }}</a>
                            @endforeach
                            <!-- <h4>{{ $committe->getPrice() }}</h4> -->
                            <a href="{{ route('committees.show', $committe->id) }}"><h3>{{ $committe->name }}</h3></a>
                            <p>{{ Str::limit($committe->description, 100) }}</p>
                            <!-- @if($committe->institution)
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ optional($committe->institution->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                        <div class="author_info_text">
                                            <p>Institution</p>
                                            <h5><a href="{{ route('committees.index') }}?institution={{ $committe->institution->id }}">{{ $committe->institution->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endif -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="float-right">
                    {{ $committees->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection