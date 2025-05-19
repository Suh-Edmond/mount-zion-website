@section('title', 'About')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/hero/slider__2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ul>
                        <h2 class="section-title">About Mount Zion Clinic Bamenda</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- about university -->
    <section class="rts-about-university rts-section-padding">
        <div class="container">
            <!-- history -->
            <div class="rts-history row mb-5">
                <div class="container">
                    <div class="row g-5 justify-content-md-center justify-content-start align-items-center">
                        <div class="col-lg-6 col-md-11">
                            <div class="rts-history-image">
                                <img src="assets/images/about/classroom_2.jpg" alt="history">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-11">
                            <div class="rts-history-section">
                                <h4 class="rts-section-title mb--40">The history of Mount Zion Higher Institutes</h4>

                                <p>
                                    At Mount Zion Higher Institutes of Nursing and Midwifery, we are committed to training high-quality nurses
                                    at the Diploma, HND, and BSc levels. Our mission is to equip students with the knowledge, skills,
                                    and professional ethics required to serve both locally and internationally, while upholding the
                                    dignity and values of the medical profession.
                                </p>

                                <p>
                                    Since our inception in 2003 in Bamenda as a one-year training institute for Special Care Nurses,
                                    MZHI has grown steadily to meet the evolving demands of healthcare education. In 2007,
                                    we expanded our impact with the establishment of a second campus in Buea, offering greater access to
                                    our programs across the region.
                                </p>
                                <p>
                                    In 2023, we achieved a significant milestone by receiving official authorization from the Ministry of Higher
                                    Education to run a three-year Higher National Diploma (HND) program in Nursing. Continuing this upward trajectory,
                                    we are proud to announce that starting in October 2025, we will offer a Bachelor’s degree (BSc) program in Nursing.
                                </p>
                                <p>
                                Today, thousands of MZHI alumni are making a meaningful impact in healthcare delivery across Cameroon, Africa, 
                                and beyond—carrying forward the legacy of excellence and compassion that defines our institution.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- history end-->

            <div class="border-top my-60"></div>

            <!-- mission and vision starts -->
            <div class="row align-items-center justify-content-md-center">
                <div class="col-lg-6 col-md-11">
                    <div class="faculty-content-text me-5">
                        <h4 class="font-32 mb-4">Mission</h4>
                        <p>
                            Mount Zion is dedicated to delivering modern, high-quality education in health sciences, grounded in ethics, integrity,
                            and compassionate care. We empower students with practical, up-to-date knowledge to serve communities and advance
                            global healthcare. Our goal is to become a sustainable, world-class institution
                            through excellence in learning, innovation, and service.
                        </p>
                        <h4 class="font-32 mb-4 mt-5">Vision</h4>
                        <p>
                            To be recognized as a global leader in higher education, research, and innovation,
                            committed to excellence and dedicated to meeting the aspirations of the international community.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-11">
                    <figure class="mt-5 mt-lg-0">
                        <img class="mw-100" src="{{asset('assets/images/hero/slider__2.jpg')}}" alt="">
                    </figure>
                </div>
            </div>
            <!-- mission and vision ends -->
        </div>
    </section>
    <!-- about university end -->


    <div class="rts-funfact rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="rts-funfact-wrapper">
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">90%</h2>
                            <p>post-graduation success rate</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">Top</h2>
                            <p>Institute that provides a holistic training</p>
                        </div>
                        <div class="single-cta-item">
                            <h2 class="single-cta-item__title">No. 1</h2>
                            <p>in the nation for special care nurses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="rts-campus-tour rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title rt-center mb--50">Our Campus Tour</h2>
                <div class="col-12">
                    <div class="rts-video-section height-500 mb--50">
                        <a href="https://www.youtube.com/watch?v=Uwq1uiuM_9w" class="rts-video-section-player popup-video video-btn">
                            <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                        <img src="assets/images/about/video-thumb.jpg" alt="video-bg">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="rts-video-section-text rt-center mx-3">
                        <a href="{{route('main.admission')}}" class="mt--15 about-btn rts-nbg-btn btn-arrow">Apply Now <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>