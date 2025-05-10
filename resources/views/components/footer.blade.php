<footer class="rts-footer v_2 pt--100 pb--100">
    <div class="container">
        <div class="row gy-5 gy-lg-0">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="rts-footer-widget w-320">
                    <a href="{{route('main.home')}}" class="d-block rts-footer-logo mb--40">
                        <img style="width: 200px" src="{{asset('assets/images/logo/logo.png')}}" alt="Unipix">
                    </a>
                    <p>
                        We are a passionate institution dedicated to providing high-quality
                        resources for learners of all backgrounds.
                    </p>
                    <div class="rts-contact-link">
                        <a href="mailto:contact@reacthemes.com"><i class="fa-sharp fa-light fa-location-dot"></i> Park, Melbourne, Australia </a>
                        <a href="callto:121"><i class="fa-thin fa-phone"></i> 485-826-710</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="rts-footer-widget ">
                    <h6 class="rt-semi">Our Campus</h6>
                    <div class="rts-footer-menu">
                        <ul>
                            <li><a href="{{route('main.academic-area')}}">Academic</a></li>
                            <!-- <li><a href="athletics.html">Athletics</a></li> -->
                            <li><a href="{{route('main.campus-life')}}">Campus life</a></li>
                            <li><a href="{{route('main.programs')}}">Research</a></li>
                            <!-- <li><a href="academic-area.html">Academic Area</a></li> -->
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
                            <li><a href="{{route('main.alumni')}}">Alumni</a></li>
                            <li><a href="{{route('main.event')}}">Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="rts-footer-widget ml--30">
                    <h6 class="rt-semi">Recent Post</h6>
                    <div class="rts-post-widget">
                        <ul class="list-unstyled">
                            <li class="single-post">
                                <a href="blog-details.html" class="blog-thumb">
                                    <img src="{{asset('assets/images/blog/w-1.jpg')}}" alt="latest post">
                                </a>
                                <div class="post-content">
                                    <span class="rt-date">October 29, 2023</span>
                                    <a href="blog-details.html">
                                        Avoid These 4 Common When Managing Remote Teams
                                    </a>
                                </div>
                            </li>
                            <li class="single-post">
                                <a href="blog-details.html" class="blog-thumb">
                                    <img src="{{asset('assets/images/blog/small-thumb-1.jpg')}}" alt="latest post">
                                </a>
                                <div class="post-content">
                                    <span class="rt-date">October 29, 2023</span>
                                    <a href="blog-details.html">
                                        Avoid These 4 Common When Managing Remote Teams
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
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
            <img src="{{asset('assets/images/logo/logo__five.svg')}}" alt="Unipix-university">
        </div>
        <div class="inner-content">
            <p class="disc">
                A modern HTML template for education, offering intuitive design & essential features for seamless learning experiences.
            </p>
            <!-- offcanvase banner -->
            <div class="offcanvase__banner mt--50">
                <div class="offcanvase__banner--content">
                    <img src="{{asset('assets/images/offcanvase.jpg')}}" alt="offcanvase">
                    <a href="admission.html" class="rts-theme-btn">Apply Now</a>
                </div>
            </div>
            <div class="offcanvase__info">
                <div class="offcanvase__info--content">
                    <a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>+(61) 485-826-710</a>
                    <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>Yarra Park, Melbourne, Australia</a>
                    <div class="offcanvase__info--content--social">
                        <p class="title">Follow Us:</p>
                        <div class="social__links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area start -->
    <div class="mobile-menu-main">
        <nav class="nav-main mainmenu-nav mt--30">
            <ul class="mainmenu metismenu" id="mobile-menu-active">

                <li class="has-droupdown">
                    <a href="#" class="main">Homepages</a>
                    <ul class="submenu mm-collapse">
                        <li><a class="mobile-menu-link" href="{{route('main.home')}}">Home</a></li>
                    </ul>
                </li>
                <li class="has-droupdown">
                    <a href="#" class="main">Pages</a>
                    <ul class="submenu mm-collapse">
                        <li><a class="mobile-menu-link" href="{{route('main.about')}}">About Us</a></li>
                        <li><a class="mobile-menu-link" href="athletics.html">Athletics</a></li>
                        <li class="has-dropdown third-lvl">
                            <a href="javascript:void(0);">Faculty</a>
                            <ul class="submenu third-lvl base">
                                <li><a class="mobile-menu-link" href="faculty-sub.html">Faculty</a></li>
                                <li><a class="mobile-menu-link" href="faculty-sub-details.html">Faculty Details</a></li>
                                <li><a class="mobile-menu-link" href="faculty.html">Faculty</a></li>
                                <li><a class="mobile-menu-link" href="faculty-details.html">Faculty Staff details</a></li>
                            </ul>
                        </li>
                        <li><a class="mobile-menu-link" href="research.html">Research</a></li>
                    </ul>
                </li>
                <li class="has-droupdown">
                    <a href="{{route('main.academics')}}" class="main">Academics</a>
                    <ul class="submenu mm-collapse">
                        <li><a class="mobile-menu-link" href="{{route('main.academics')}}">Academic</a></li>
                        <li><a class="mobile-menu-link" href="admission.html">Admission</a></li>
                        <li><a class="mobile-menu-link" href="academic-area.html">Academic Area</a></li>
                        <li><a class="mobile-menu-link" href="campus-life.html">Campus Life</a></li>
                        <li><a class="mobile-menu-link" href="scholarship.html">Scholarship</a></li>
                        <li><a class="mobile-menu-link" href="tution-fee.html">Tution Fee</a></li>
                        <li><a class="mobile-menu-link" href="alumni.html">Alumni</a></li>
                        <li><a class="mobile-menu-link" href="program-single.html">Program Single</a></li>
                        <li><a class="mobile-menu-link" href="department-details.html">Department Details</a></li>
                    </ul>
                </li>

                <li class="has-droupdown">
                    <a href="{{route('main.event')}}" class="main">Events</a>
                </li>
                <li class="has-droupdown">
                    <a href="{{route('main.blog')}}" class="main">Blog</a>
                </li>
                <li>
                    <a href="{{route('main.contact')}}" class="main">Contact Us</a>
                </li>
            </ul>
        </nav>

        <div class="offcanvase__info--content mt--30">
            <a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>+(61) 485-826-710</a>
            <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>Yarra Park, Melbourne, Australia</a>
            <div class="offcanvase__info--content--social">
                <p class="title">Follow Us:</p>
                <div class="social__links">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
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
