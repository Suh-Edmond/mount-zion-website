@section('title', 'Mount-Zion')

<x-guest-layout>
    <div class="rts-hero-slider rt-relative v_2">
        <div class="rts-hero-slider-active swiper swiper-data" data-swiper='{
            "slidesPerView":1,
            "effect": "fade",
            "loop": false,
            "speed": 1000,
            "navigation":{
                "nextEl":".rt-next",
                "prevEl":".rt-prev"
            },
            "autoplay":{
                "delay":"7000"
            }
}'>
            <div class="swiper-wrapper">
                <!-- single slider -->
                <div class="swiper-slide">
                    <div class="rts-slider-height rts-slider-overlay rt-relative ">
                        <div class="rts-slider-bg" data-background="assets/images/hero/slider__1.jpg" style="background-image: url(assets/images/hero/slider__1.jpg);"></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-xl-6 col-md-8 col-sm-9">
                                    <div class="rts-slider">
                                        <div class="rts-slider-content">
                                            <h6 class="rts-subtitle"><img src="assets/images/icon/e-cap.svg" alt="education hat"> excellence in healthcare education</h6>
                                            <h1 class="rts-slider-title">
                                                Mount Zion Clinic
                                                Advancing Healthcare
                                            </h1>
                                            <p class="rts-slider-desc">
                                                Benefit from our commitment to the latest medical knowledge and innovative treatment approaches for your optimal well-being
                                            </p>
                                            <div class="rts-slider-btn">
                                                <a href="{{route('main.programs')}}" class="rts-theme-btn btn-arrow">View Our Services <span><i class="fa-thin fa-arrow-right"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider -->
                <div class="swiper-slide">
                    <div class="rts-slider-height rts-slider-overlay rt-relative ">
                        <div class="rts-slider-bg" data-background="assets/images/hero/slider__2.jpg" style="background-image: url(assets/images/hero/slider__2.jpg);"></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-xl-6 col-md-8 col-sm-9">
                                    <div class="rts-slider">
                                        <div class="rts-slider-content">
                                            <h6 class="rts-subtitle"><img src="assets/images/icon/e-cap.svg" alt="education hat"> knowledge meets innovation</h6>
                                            <h1 class="rts-slider-title">
                                                Mount Zion Institutes
                                            </h1>
                                            <p class="rts-slider-desc">
                                                Be at the forefront of healthcare advancements through rigorous academic programs and opportunities for research and discovery.
                                            </p>
                                            <div class="rts-slider-btn">
                                                <a href="{{route('main.programs')}}" class="rts-theme-btn btn-arrow">View Our Programs <span><i class="fa-thin fa-arrow-right"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero slider  end -->

        <!-- history start -->
        <div class="rts-campus rts-campus-bg v_2">
        <div class="container">
            <div class="row g-40 align-items-center">
                <div class="col-lg-6">
                    <div class="rts-left-section">
                        <h2 class="section-title">
                            Our
                            <span>History</span>
                        </h2>
                        <div class="left-section-content">
                            <p>
                                Mount Zion University emerged from a profound need. Founded in , its origins lie in a vision to provide accessible and high-quality education for aspiring healthcare professionals in Cameroon and beyond. Initially established as Mount Zion University, it offered foundational programs in nursing and laboratory science.
                            </p>
                            <a href="{{route('main.about')}}" class="rts-theme-btn primary btn-arrow">Read More<span><i class="fa-thin fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rts-right-section rt-relative">

                        <div class="campus-video">
                            <img src="assets/images/home/dr_atem.jpg" alt="campus images">
                            <!-- <a class="video-play popup-video" href="https://www.youtube.com/watch?v=Uwq1uiuM_9w">
                                <img src="assets/images/icon/play-round.svg" class="round" alt="">
                                <img src="assets/images/icon/play-icon.svg" class="play-icon" alt="">
                            </a> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- <div class="rt-shape">
            <img class="rt-shape__1" src="assets/images/feature/shape/01.png" alt="">
            <img class="rt-shape__2" src="assets/images/feature/shape/02.png" alt="">
            <img class="rt-shape__3" src="assets/images/feature/shape/03.png" alt="">
            <img class="rt-shape__4" src="assets/images/feature/shape/04.png" alt="">
        </div> -->
        </div>
    </div>
    <!-- history end -->

    <!-- our mission start -->
    <section class="program rts-section-padding">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="rts__section--wrapper v__2">
                        <h2 class="rts__section--title text-capitalize">Our Mission</h2>
                        <p class="rts__section--description">
                            Mount Zion is dedicated to delivering modern, high-quality education in health sciences, grounded in ethics, integrity, and compassionate care. We empower students with practical, up-to-date knowledge to serve communities and advance global healthcare. Our goal is to become a sustainable, world-class institution through excellence in learning, innovation, and service.
                        </p>
                        <div class="campus__vector">
                            <img src="assets/images/campus/campus__vector.svg" alt="">
                        </div>
                        <a href="{{route('main.academics')}}" class="rts-theme-btn btn-arrow">View All Program
                            <span><i class="fa-regular fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-10 mt-5 mt-md-0">
                    <div class="row g-5">
                        <div class="col-lg-6 col-md-6">
                            <div class="program__content">
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/home/procession.jpg);">
                                    <h5 class="rts__program--item--title">Special Programs</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Mount Zion with our 1 year programs.</p>
                                    <a href="{{route('main.academics')}}" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Special Programs</h5>
                                </div>
                                <!-- second one -->
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/home/classroom_1.jpg);">
                                    <h5 class="rts__program--item--title">HND Programs</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Mount Zion with our HND programs.</p>
                                    <a href="{{route('main.academics')}}" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">HND Programs</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="program__content mt--85">
                                <div class="rts__program--item v__2" style="background-image: url(assets/images/home/demonstration.jpg);">
                                    <h5 class="rts__program--item--title">Bsc Programs</h5>
                                    <p class="rts__program--item--description">Embark on a journey of knowledge discovery, and growth at Mount Zion Institute.</p>
                                    <a href="program-single.html" class="rts-nbg-btn btn-arrow">Learn More<span><i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </span></a>
                                    <h5 class="rts__program--item--title--show">Bsc Programs</h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our mission end -->

    <!-- our vision start -->
    <div class="rts-campus pt--100 rts-campus-bg mobile-padding moving">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-lg-start">
                <div class="col-lg-6 col-xl-5 col-md-10 col-sm-11">
                    <div class="rts-left-section">
                        <h2 class="section-title rt-white mb--55">
                            Our Vision
                        </h2>
                        <a href="{{route('main.academics')}}" class="about-btn rts-nbg-btn btn-arrow
                    rt-white">Learn More <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>

                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 col-md-10 col-sm-11">
                    <div class="rts-right-section rt-relative">
                        <p class="rt-white mb--40">
                            To be recognized as a global leader in higher education, research, and innovation, committed to excellence and dedicated to meeting the aspirations of the international community.
                        </p>
                        <div class="rts-round-shape"></div>
                    </div>
                </div>
            </div>
            <div class="pb-5 mt-5"></div>
            <div class="rt-shape">
                <img class="rt-shape__1" data-speed="0.04" src="assets/images/feature/shape/01.png" alt="">
                <img class="shape rt-shape__2" data-speed="0.04" src="assets/images/feature/shape/02.png" alt="">
                <img class="shape rt-shape__3" data-speed="0.04" src="assets/images/feature/shape/03.png" alt="">
                <img class="shape rt-shape__4" data-speed="0.04" src="assets/images/feature/shape/04.png" alt="">
            </div>
        </div>
    </div>
    <!-- our vision end -->

    <!-- schools start -->
    <section class="blog pt--120">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__8">
                    <div class="rts__section--wrapper--left">
                        <h2 class="rts__section--title mb--15">Our Campuses</h2>
                        <p class="rts__section--description">Our mission is to provide you with valuable insights</p>
                    </div>

                </div>
            </div>
            <!-- schools area -->
            <div class="row g-5">
                @foreach($schools as $school)
                <div class="col-lg-6 col-md-6">
                    <div class="blog__single--item">
                        <a href="{{route('main.schools.show', $school->slug)}}" class="blog__single--item--link">
                            <div class="blog__single--item--thumb">
                                <img src="{{ asset( $school->image_path) }}" alt="{{ $school->name }}">
                            </div>
                        </a>
                        <div class="blog__single--item--meta">
                            <a href={{route('main.schools.show', $school->slug)}} class="blog__cat">Campus</a>
                            <h5 class="blog__single--item--title">
                                <a href="{{route('main.schools.show', $school->slug)}}">{{ $school->name }}</a>
                            </h5>

                            <p class="blog__single--item--excerpt">{{ $school->address }}</p>

                            <div class="blog__single--item--info">
                                <div class="author">
                                    <span><i class="fa-thin fa-phone"></i></span>
                                    <a href={{'tel:'.$school->telephone}}>{{ $school->telephone }}</a>
                                </div>
                            </div>

                            <div class="blog__single--item--info">
                                <div class="author">
                                    <span><i class="fa-thin fa-envelope"></i></span>
                                    <a href={{'mailto:'.$school->email}}>{{ $school->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- schools end -->

    <!-- Our partners start -->
    <div class="rts-brand v_1 pb--85 pt--85">
        <div class="container">
        <div class="row">
                <div class="rts__section--wrapper v__8">
                    <div class="rts__section--wrapper--left">
                        <h2 class="rts__section--title mb--15">Our Partners</h2>
                    </div>

                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-11">
                    <div class="rts-brand-slider swiper swiper-data" data-swiper='{
                    "slidesPerView":6,
                    "loop": true,
                    "autoplay":{
                        "delay":"3000"
                    },
                    "breakpoints":{
                        "320":{
                            "slidesPerView": 3,
                            "centeredSlides": true
                        },
                        "575":{
                            "slidesPerView": 4,
                            "centeredSlides": true
                        },
                        "768":{
                            "slidesPerView": 5,
                            "centeredSlides": true
                        },
                        "991":{
                            "slidesPerView": 6,
                            "centeredSlides": true
                        },
                        "1201":{
                            "slidesPerView": 6
                        }
                    }
            }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand-logo">
                                    <a href="{{route('main.about')}}">
                                        <img src="assets/images/partners/partner_2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our partners end -->

    <!-- program start -->
    <section class="rts-program v_2 rts-section-padding">
        <div class="container">
            <div class="row rt-center">
                <div class="col-sm-12">
                    <div class="rts__section--wrapper v__5">
                        <h2 class="rts__section--title">Discover Our Programs</h2>
                    </div>
                </div>
            </div>
            <!-- program content -->
            <div class="row justify-content-center g-0">
                <div class="col-lg-4 col-md-10">
                    <div class="rts-program-single">
                        <div class="rts-program-single__content">
                            <div class="rts-program-hover">
                                <div class="icon">
                                    <img src="assets/images/program/icon/03.svg" alt="education">
                                </div>
                                <a href="{{route('main.academics')}}" class="program-link">Special Care</a>
                                <p>Embark on a journey of knowledge, discovery, and growth at Mount Zion University.</p>
                                <a href="{{route('main.academics')}}" class="about-btn rts-nbg-btn btn-arrow
rt-white before-white">View Program <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-10">
                    <div class="rts-program-single ">
                        <div class="rts-program-single__content">
                            <div class="rts-program-hover center-item rt-primary-bg">
                                <ul class="list-unstyled">
                                    <li class="single-program">
                                        <div class="icon-box">
                                            <img src="assets/images/icon/05.svg" alt="">
                                        </div>
                                        <a href="{{route('main.academics')}}">Special Care</a>
                                    </li>
                                    <li class="single-program">
                                        <div class="icon-box">
                                            <img src="assets/images/icon/04.svg" alt="">
                                        </div>
                                        <a href="{{route('main.academics')}}">HND Programs</a>
                                    </li>
                                    <li class="single-program">
                                        <div class="icon-box">
                                            <img src="assets/images/icon/06.svg" alt="">
                                        </div>
                                        <a href="{{route('main.academics')}}">Bachelor’s Programs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-10">
                    <div class="rts-program-single">
                        <div class="rts-program-single__content">
                            <div class="rts-program-hover">
                                <div class="icon">
                                    <img src="assets/images/program/icon/01.svg" alt="education">
                                </div>
                                <a href="{{route('main.academics')}}" class="program-link">Bachelor's Programs</a>
                                <p>Empower yourself with the skills to heal and lead at Mount Zion University</p>
                                <a href="{{route('main.academics')}}" class="about-btn rts-nbg-btn btn-arrow
rt-white before-white">Visit Program <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- program end -->


    <!-- apply start -->
    <section class="rts-application-area  rts-section-padding v_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="rts-section rt-center mb--80">
                    <h2 class="rts-section-title">Apply Now</h2>
                </div>
            </div>
            <!-- application form -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="rts-admission-form-image">
                        <img src="assets/images/home/demonstration.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-10">
                    @include('components.application-form')
                </div>
            </div>
            <div class="rt-shape">
                <img src="assets/images/apply/shape/01.png" alt="shape" class="shape rt-shape__1">
                <img src="assets/images/apply/shape/02.png" alt="shape" class="shape rt-shape__2">
                <img src="assets/images/apply/shape/03.png" alt="shape" class="shape rt-shape__3">
                <img src="assets/images/apply/shape/04.png" alt="shape" class="shape rt-shape__4">
            </div>
        </div>
    </section>
    <!-- apply end -->

    <!-- support us -->
    <section class="rts-scholarship rts-scholarship-bg rts-section-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="rts-scholarship-info">
                        <h2 class="rts-section-title">Support Us</h2>
                        <p class="w-740 mb--50">
                            We invite you to join us in our vision to strengthen healthcare in the Cameroon and beyond. Your sponsorship will be instrumental in sustaining access to quality health personnel education. Together, we can empower these future professionals to make a lasting positive impact on the health and well-being of our nation
                        </p>
                        <a href="{{route('main.contact')}}" class="rts-theme-btn btn-arrow">Know More<span><i class="fa-thin fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- support end -->

    <!-- blog area start -->
    <!-- <div class="rts-blog rts-section-padding v_2 no-bg">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-11 col-lg-12">
                    <div class="rts-section rts-border-bottom-1 mb--50 pb--20">
                        <h2 class="rts-section-title">
                            Latest From Our Blogs
                        </h2>
                        <p class="rts-section-description">Whether you’re considering a 1 year course, HND or an undergraduate academics here is the place for you.</p>
                        <a href="{{route('main.programs')}}" class="rts-arrow">View All <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="rts-blog-post blog-v-full">
                        <div class="single-blog-post">
                            <a href="../blog-details.html" class="blog-thumb">
                                <img src="assets/images/blog/big-thumb-1.jpg" alt="blog-thumb">
                            </a>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <div class="rt-author">
                                        <span>
                                            <i class="fa-light fa-user"></i>
                                        </span>
                                        <a href="#">Samira Khan</a>
                                    </div>
                                    <div class="rt-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>November 28, 2023</span>
                                    </div>
                                </div>
                                <a href="blog-detail.html" class="post-title">
                                    Interactive Worksheets: Printable worksheets have come to life!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rts-blog-post">
                        <div class="single-blog-post">
                            <div class="blog-thumb">
                                <a href="../blog-details.html">
                                    <img src="assets/images/blog/small-thumb-1.jpg" alt="post-thumbnail">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <div class="rt-author">
                                        <span>
                                            <i class="fa-light fa-user"></i>
                                        </span>
                                        <a href="#">Samira Khan</a>
                                    </div>
                                    <div class="rt-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>November 28, 2023</span>
                                    </div>
                                </div>
                                <a href="../blog-details.html" class="post-title">
                                    Classroom community-building It’s ok to try something new!
                                </a>
                            </div>
                        </div>
                        <div class="single-blog-post">
                            <div class="blog-thumb">
                                <a href="../blog-details.html">
                                    <img src="assets/images/blog/small-thumb-2.jpg" alt="post-thumbnail">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <div class="rt-author">
                                        <span>
                                            <i class="fa-light fa-user"></i>
                                        </span>
                                        <a href="#">Samira Khan</a>
                                    </div>
                                    <div class="rt-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>November 28, 2023</span>
                                    </div>
                                </div>
                                <a href="../blog-details.html" class="post-title">
                                    Those inequalities are inequalities that occur within households
                                </a>
                            </div>
                        </div>
                        <div class="single-blog-post">
                            <div class="blog-thumb">
                                <a href="../blog-details.html">
                                    <img src="assets/images/blog/small-thumb-3.jpg" alt="post-thumbnail">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="post-meta">
                                    <div class="rt-author">
                                        <span>
                                            <i class="fa-light fa-user"></i>
                                        </span>
                                        <a href="#">Samira Khan</a>
                                    </div>
                                    <div class="rt-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>November 28, 2023</span>
                                    </div>
                                </div>
                                <a href="../blog-details.html" class="post-title">
                                    After decades of improvement, health rates on worrying
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- blog area end -->

    <!-- newsletter -->
    <!-- <div class="rts-newsletter v_1 rts-cta-background rts__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rts-newsletter-box" style="background-image: url(assets/images/home/alumni.jpg);">
                        <div class="rts-newsletter-box-content">
                            <h4 class="newsletter-title">Don’t Miss Any Awesome Story From Us
                            </h4>
                            <div class="newsletter-form w-530">
                                <form action="#">
                                    <input type="email" name="subscription" id="subscription" placeholder="Enter Your mail" required>
                                    <button type="submit" class="rts-nbg-btn btn-arrow">Subscribe <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- newsletter end -->
</x-guest-layout>