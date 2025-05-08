<header class="header header__sticky v__1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__wrapper">
                    <div class="header__logo">
                        <a href="{{route('main.home')}}" class="header__logo--link">
                            <img src="assets/images/logo/logo__white.svg" alt="unipix">
                        </a>
                    </div>
                    <div class="header__menu">
                        <div class="navigation">
                            <nav class="navigation__menu">
                                <ul>
                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.home')}}" class="navigation__menu--item__link">Home</a>
{{--                                        <ul class="submenu sub__style">--}}
{{--                                            <li><a href="index.html">Home Style One</a></li>--}}
{{--                                            <li><a href="index-two.html">Home Style Two</a></li>--}}
{{--                                            <li><a href="index-three.html">Home Style three</a></li>--}}
{{--                                            <li><a href="index-four.html">Home Style four</a></li>--}}
{{--                                            <li><a href="index-five.html">Home Style five</a></li>--}}
{{--                                        </ul>--}}
                                    </li>

                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.about')}}" class="navigation__menu--item__link">About</a>
{{--                                        <ul class="submenu sub__style">--}}
{{--                                            <li><a href="about.html">About</a></li>--}}
{{--                                            <li><a href="athletics.html">Athletics</a></li>--}}
{{--                                            <li class="has-child has-arrow">--}}
{{--                                                <a href="#">Faculty</a>--}}
{{--                                                <ul class="sub__style">--}}
{{--                                                    <li><a class="mobile-menu-link" href="faculty-sub.html">Faculty</a></li>--}}
{{--                                                    <li><a class="mobile-menu-link" href="faculty-sub-details.html">Faculty Details</a></li>--}}
{{--                                                    <li><a href="faculty.html">Faculty Staff</a></li>--}}
{{--                                                    <li class="has-child"><a href="faculty-details.html">Faculty Staff details</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="research.html">Research</a></li>--}}
{{--                                        </ul>--}}
                                    </li>
                                    <li class="navigation__menu--item has-child has-arrow">
                                        <a href="{{route('main.academics')}}" class="navigation__menu--item__link">Academics</a>
                                        <ul class="submenu sub__style">
                                            <li><a href="{{route('main.academics')}}">Academic</a></li>
                                            <li><a href="{{route('main.admission')}}">Admission</a></li>
                                            <li><a href="{{route('main.academic-area')}}">Academic Area</a></li>
                                            <li><a href="{{route('main.campus-life')}}">Campus Life</a></li>
                                            <li><a href="{{route('main.scholarship')}}">Scholarship</a></li>
                                            <li><a href="{{route('main.tuition-fee')}}">Tuition Fee</a></li>
                                            <li><a href="{{route('main.alumni')}}">Alumni</a></li>
{{--                                            <li><a href="program-single.html">Program Single</a></li>--}}
{{--                                            <li><a href="department-details.html">Department Details</a></li>--}}
                                        </ul>
                                    </li>
                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.event')}}" class="navigation__menu--item__link">Event</a>
                                    </li>
                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.blog')}}" class="navigation__menu--item__link">Blog</a>
                                    </li>
                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.contact')}}" class="navigation__menu--item__link">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header__right">
                        <div class="header__right--item">
                            <div id="langSwitcher" class="lang__trigger">
                                <span class="selected__lang">English</span>
                                <i class="fa-light fa-globe"></i>
                                <div class="translate__lang">
                                    <ul>
                                        <li><a href="#" class="active">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Romanian</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="search-btn" class="search__trigger">
                                <i class="fa-sharp fa-light fa-magnifying-glass"></i>
                            </div>
                            <div id="menu-btn" class="menu__trigger">
                                <img src="assets/images/icon/bar__line.svg" alt="bar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
