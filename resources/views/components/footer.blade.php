<footer class="rts-footer v_2 pt--100 pb--100">
    <div class="container">
        <div class="row gy-5 gy-lg-0">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="rts-footer-widget w-320">
                    <a href="{{route('main.home')}}" class="d-block rts-footer-logo mb--40">
                        <img style="width: 200px" src="{{asset('assets/images/logo/resized_logo.png')}}" alt="Unipix">
                    </a>
                    <p>
                        We are a passionate institution dedicated to providing high-quality
                        resources for learners of all backgrounds.
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="rts-footer-widget ">
                    <h6 class="rt-semi">Our Campus</h6>
                    <div class="rts-footer-menu">
                        <ul>
                            <li><a href="{{route('main.academic-area')}}">Academic</a></li>
                            <li><a href="{{route('main.academic-area')}}">Research</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4">
                <div class="rts-footer-widget ml--30">
                    <h6 class="rt-semi">Our Clinic</h6>
                    <div class="rts-footer-menu">
                        <ul>
                            <li><a href="{{route('main.about')}}">About </a></li>
                            <li><a href="{{route('main.tuition-fee')}}">Tuition Fee</a></li>
                            <li><a href="{{route('main.event')}}">Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="rts-footer-copy-right v_1">
    <div class="container">
        <div class="row">
            <div class="rt-center">
                <p class="--p-xs">Copyright &copy; <span id="year"></span> All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->
<!-- offcanvase menu -->
<!-- header style two -->
<div id="side-bar" class="side-bar">
    <button class="close-icon-menu"><i class="far fa-times"></i></button>
    <!-- inner menu area desktop start -->
    <div class="inner-main-wrapper-desk">
        <div class="thumbnail">
            <img src="{{asset('assets/images/logo/logo.png')}}" alt="mount zion">
        </div>
        <div class="inner-content">
            <!-- offcanvase banner -->
            <div class="offcanvase__banner mt--50">
                <div class="offcanvase__banner--content">
                    <img src="{{asset('assets/images/sidebar/graduation.jpg')}}" alt="appl now">
                    <a href="{{route('main.admission')}}" class="rts-theme-btn">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area start -->
    <div class="mobile-menu-main">
        <nav class="nav-main mainmenu-nav mt--30">
            <ul class="mainmenu metismenu" id="mobile-menu-active">

                <li>
                    <a href="{{route('main.home')}}" class="main">Home</a>
                </li>

                <li class="has-droupdown">
                    <a class="main">About</a>
                    <ul class="submenu mm-collapse">
                        <li><a class="mobile-menu-link" href="{{route('main.about')}}">MOunt Zion Institutes</a></li>
                        <li><a class="mobile-menu-link" href="{{route('main.clinic')}}">MOunt Zion Clinic</a></li>
                        <li><a class="mobile-menu-link" href="{{route('main.ceo')}}">The CEO</a></li>
                    </ul>
                </li>

                <li class="has-droupdown">
                    <a class="main">Academics</a>
                    <ul class="submenu mm-collapse">
                        <li><a class="mobile-menu-link" href="{{route('main.admission')}}">Admission</a></li>
                        <li><a class="mobile-menu-link" href="{{route('main.academic-area')}}">Programs</a></li>
                        <li><a class="mobile-menu-link" href="{{route('main.tuition-fee')}}">Tution Fee</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('main.event')}}" class="main">Events</a>
                </li>
                <li>
                    <a href="{{route('main.donate')}}" class="main">Donate</a>
                </li>
                <li>
                    <a href="{{route('main.contact')}}" class="main">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- mobile menu area end -->
</div>
<!-- header style two End -->

<div class="search-input-area">
    <div class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <input class="search-input autocomplete ui-autocomplete-input" type="text" placeholder="Search by keyword or #" autocomplete="off">
                <button><i class="far fa-search"></i></button>
            </div>
        </div>
    </div>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<!-- rts backto top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>
<!-- rts back to top end -->
<div id="anywhere-home" class="">
</div>