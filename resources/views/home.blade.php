@extends('layouts.main')

@section('content')
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Our Committees</p>
                        <h2>Indore World Summit-2022</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($newestCommittees as $committee)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <a href="{{ route('register') }}">
                                <img src="{{ optional($committee->photo)->getUrl() ?? asset('img/no_image.png') }}"
                                    class="special_img" alt="">
                                <div class="special_cource_text">
                                    <h3>{{ $committee->name }}</h3>
                                    <p>{{ Str::limit($committee->description, 100) }}</p>
                                    @if ($committee->portfolio)
                                        <div class="author_info">
                                            <div class="author_img">
                                                <div class="author_info_text">
                                                    <p>Portfolio</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
