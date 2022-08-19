<header class="main_menu {{ isset($breadcrumb) ? 'single_page_menu' : 'home_menu' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_1" href="https://muniversiti.org"> <img
                            src="{{ asset('img/header_afs.svg') }}" alt="logo"> </a>
                    <a class="navbar-brand logo_2" href="https://muniversiti.org"> <img src="{{ asset('img/header_afs.svg') }}"
                            alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation" style="
    margin-left: 98%;
    padding-right: initial;
    padding-left: initial;
    padding-top: initial;
    padding-bottom: initial;
    margin-top: -22%;
">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/afscollab">AFS India</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/itinerary">Itinerary</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('enroll.myCommittees') }}">My Committees</a>
                            </li>
                            
                            @auth
                            <li class="nav-item">
                                    <a class="btn_1" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                                    <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                     <li class="nav-item">
                                     <a class="btn_1" href="{{ route('register') }}">Login/SignUp</a>
                                      </li>
                            @endauth
                            <!--@if ($menuDisciplines->count())-->
                            <!--    <li class="nav-item dropdown">-->
                            <!--        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"-->
                            <!--            role="button" data-toggle="dropdown" aria-haspopup="true"-->
                            <!--            aria-expanded="false">-->
                            <!--            Disciplines-->
                            <!--        </a>-->
                            <!--        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                            <!--            @if(auth()->user())-->
                            <!--                <a class="dropdown-item" href="{{ url('/') . '/admin/enrollments' }}">IWS Delegation</a>-->
                            <!--            @else-->
                            <!--                <a class="dropdown-item" href="{{ url('/') . '/register' }}">IWS Delegation</a>-->
                            <!--            @endif-->
                            <!--            <a class="dropdown-item" href="{{ url('/') . '/register' }}">Campus Ambassador</a>-->
                            <!--        </div>-->
                            <!--    </li>-->
                            <!--@endif-->
                            @if ($menuPortfolios->count())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Portfolios
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($menuPortfolios as $id => $portfolio)
                                            <a class="dropdown-item"
                                                href="{{ route('committees.index') }}?portfolio={{ $id }}">{{ $portfolio }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
