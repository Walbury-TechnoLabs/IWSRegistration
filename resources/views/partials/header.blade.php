<header class="main_menu {{ isset($breadcrumb) ? 'single_page_menu' : 'home_menu' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_1" href="https://muniversiti.org"> <img
                            src="{{ asset('img/header_afs_light.png') }}" alt="logo"> </a>
                    <a class="navbar-brand logo_2" href="https://muniversiti.org"> <img src="{{ asset('img/header_afs.png') }}"
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
                        <ul class="navbar-nav align-items-center" style="font-size: 18px; font-family: 'Poppins'; color: black;">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/afscollab" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

">AFS India</a>
                            </li>
                            <li class="nav-item dropdown">
                        		   <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

">  Resources  </a>
                        		    <ul class="dropdown-menu">
                        			  <li><a class="dropdown-item" href="/itinerary" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

"> Itinerary</a></li>
                        			  <li><a class="dropdown-item" href="/country-matrix" style="
    text-align: left;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

"> Country Matrix</a></li>
                        			  
                        		    </ul>
		                    </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('enroll.myCommittees') }}" style="
    text-align: center;
    text-decoration: auto;
    font-family: sans-serif;
    
        font-weight: 600;

">My Committees</a>
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
