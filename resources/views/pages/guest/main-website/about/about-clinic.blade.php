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

    <section class="rts-campus-tour rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title rt-center mb--50">Brief History</h2>
                <div class="col-12">
                    <div class="rts-video-section height-500 mb--50">
                        <a href="https://www.youtube.com/watch?v=NhHUtymH9f8" class="rts-video-section-player popup-video video-btn">
                            <i class="fa-sharp fa-solid fa-play"></i>
                        </a>
                        <img src="assets/images/about/clinic_building.jpg" alt="video-bg">
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- <div class="rts-video-section-text rt-center mx-3">
                        <a href="{{route('main.admission')}}" class="mt--15 about-btn rts-nbg-btn btn-arrow">Apply Now <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- about clinic -->
    <section class="rts-about-university">
        <div class="container">
            <!-- history -->
            <div class="rts-history row mb-5">
                <div class="container">
                    <div class="row g-5 justify-content-md-center justify-content-start align-items-center">
                        <div class="col-lg-6 col-md-11">
                            <div class="rts-history-image">
                                <img src="assets/images/about/patient.jpg" alt="history">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-11">
                            <div class="rts-history-section">
                                <h4 class="rts-section-title mb--40"></h4>

                                <p>
                                    Mount Zion Clinic is a leading medical facility in Bamenda, Cameroon,
                                    committed to delivering compassionate, high-quality, and affordable
                                    healthcare to over 300,000 residents in the region.
                                    Since our founding in September 1992, we have grown into a trusted institution
                                    known for integrity, professionalism, and holistic care.
                                </p>

                                <p>
                                    For over 33 years, we have served thousands of patients across core specialties
                                    including General Medicine, Obstetrics and Gynaecology, Paediatrics, and Minor Surgeries.
                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- history end-->


            <section class="rts-research-section rts-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="rts-research-section__content">
                            <div class="rts-section">
                                <h3 class="rts-section-title">
                                    Our Services
                                </h3>
                            </div>
                        </div>
                        <!-- research item -->
                        <div class="research__items">
                            <!-- apply content -->

                            <div class="row justify-content-sm-center justify-content-md-start g-5">
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure">
                                        <div class="rt-serial">01</div>
                                        <a href="#">Outpatient consultations</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure primary-style">
                                        <div class="rt-serial">02</div>
                                        <a>Laboratory services</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure">
                                        <div class="rt-serial">03</div>
                                        <a>In-patient care with 20-bed unit</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 justify-content-sm-center justify-content-md-start g-5">
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure">
                                        <div class="rt-serial">04</div>
                                        <a>Antenatal and maternity care</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure primary-style">
                                        <div class="rt-serial">05</div>
                                        <a>Dental services</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure">
                                        <div class="rt-serial">06</div>
                                        <a href="{{ route('main.communityOutreach') }}">Community health outreach</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-sm-center justify-content-md-start g-5">
                                <div class="col-lg-4 col-md-6 col-sm-11">
                                    <div class="research-procedure">
                                        <div class="rt-serial">07</div>
                                        <a>Nursing education programs (Diploma, HND, and BSc in Nursing)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- excellence starts -->
            <div class="row align-items-center justify-content-md-center rts-section-padding">
                <div class="col-lg-6 col-md-11">
                    <div class="faculty-content-text me-5">
                        <h4 class="font-32 mb-4 mt-5">Excellence</h4>

                        <p>
                            In July 2018, we reached a major milestone by moving into our permanent,
                            purpose-built facility on Vicky Street, Bamenda—enhancing our capacity to serve
                            more patients in a modern, welcoming environment.
                        </p>
                        <p>
                            Passionately pro-life, Mount Zion Clinic is deeply committed to
                            protecting the dignity of human life from conception to natural
                            death. Our approach goes beyond physical treatment, addressing the
                            emotional and spiritual needs of those we care for.
                        </p>
                        <p>
                            In recognition of our unwavering commitment, Mount Zion Clinic was
                            awarded the Prize of Excellence in Pro-Life Work in 2024, following a national
                            survey conducted by a consortium of newspapers. This honor reflects our ongoing dedication
                            to life-affirming healthcare and community service.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-11">
                    <figure class="mt-5 mt-lg-0">
                        <img class="mw-100" src="{{asset('assets/images/about/award.jpg')}}" alt="">
                    </figure>
                </div>
            </div>
            <!-- excellence ends -->
        </div>
    </section>
    <!-- about university end -->

    <div class="rts-gallery rts__light rts-section-padding ">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__5">
                    <h2 class="rts__section--title">Gallery</h2>
                </div>
            </div>
            <div class="gallery-area">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image4.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image4.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image7.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image7.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image12.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image12.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image3.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image3.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image17.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image17.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image24.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image24.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image24.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image24.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image29.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image29.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image30.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image30.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image33.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image33.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image31.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image31.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image10.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image10.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt--50">
                    <a href="{{route('main.communityOutreach')}}">
                        Mount Zion Clinic in partnership with The Luke Society Intl. medical missions to Tingo Okwala Cameroon
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-funfact rts-section-padding">

    </div>

</x-guest-layout>