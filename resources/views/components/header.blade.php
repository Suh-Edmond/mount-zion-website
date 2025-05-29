<header class="header header__sticky v__1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__wrapper">
                    <div class="header__logo">
                        <a href="{{route('main.home')}}" class="header__logo--link">
                            <img class="header__logo-img" src="{{ asset('assets/images/logo/resized_logo.png') }}" alt="mount zion logo">
                        </a>
                    </div>
                    <div class="header__menu">
                        <div class="navigation">
                            <nav class="navigation__menu">
                                <ul>
                                    <li class="navigation__menu--item">
                                        <a href="{{route('main.home')}}" class="navigation__menu--item__link">Home</a>
                                    </li>

                                    <li class="navigation__menu--item has-child has-arrow">
                                        <a class="navigation__menu--item__link">About Us</a>
                                        <ul class="submenu sub__style">
                                            <li><a href="{{route('main.home').'#mission'}}">Mission</a></li>
                                            <li><a href="{{route('main.home').'#vision'}}">Vision</a></li>
                                            <li><a href="{{route('main.clinic')}}">MZ Clinic</a></li>
                                            <li><a href="{{route('main.about')}}">MZHI</a></li>
                                            <li><a href="{{route('main.ceo')}}">Administrators</a></li>
                                        </ul>
                                    </li>
                                    <li class="navigation__menu--item has-child has-arrow">
                                        <a class="navigation__menu--item__link">Academics</a>
                                        <ul class="submenu sub__style">
                                            <li><a href="{{route('main.academic-area')}}">Programs</a></li>
                                            <li><a href="{{route('main.admission')}}">Eligibility Criteria </a></li>
                                            <li><a href="{{route('main.tuition-fee')}}">Tuition Fee</a></li>
                                            <li><a href="{{route('main.staff')}}">MZHI Staff</a></li>
                                        </ul>
                                    </li>
                                    <li class="navigation__menu--item"></li>
                                    <a href="{{route('main.event')}}" class="navigation__menu--item__link">Events</a>
                                    </li>
                                    <li class="navigation__menu--item"></li>
                                    <a href="{{route('main.donate')}}" class="navigation__menu--item__link">Donate</a>
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
                            <a href="{{route('main.admission')}}" class="rts-theme-btn btn-arrow v2 full-btn">Apply Now <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                            <div id="menu-btn" class="menu__trigger">
                                <img src="{{ asset('assets/images/icon/bar__line.svg') }}" alt="bar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>