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
                        <h2 class="section-title">Medical Missions to Tingo Okwala</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <div class="rts-gallery rts__light rts-section-padding ">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__5">
                    <h5 class="rts__section--title">
                        Mount Zion Clinic in partnership with The Luke Society Intl. 
                        medical missions to Tingo Okwala Cameroon
                    </h2>
                </div>
            </div>
            <div class="gallery-area">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image1.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image1.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image21.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image21.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image26.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image26.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image37.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image37.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image39.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/clinic/image39.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset('assets/images/about/clinic/image39.jpg')}}" class="single-gallery__item">
                                <img src="{{asset('assets/images/about/dr_atem_3.jpg')}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="vision" class="rts-campus pt--100 rts-campus-bg mobile-padding moving">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-lg-start">
                <div class="col-lg-6 col-xl-5 col-md-10 col-sm-11">
                    <div class="rts-left-section">
                        <h2 class="section-title rt-white mb--55">
                            Our Partnership with The Luke Society
                        </h2>
                        <a href="https://www.lukesociety.org/bamenda-cameroon" class="about-btn rts-nbg-btn btn-arrow
                    rt-white">Learn More <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>

                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 col-md-10 col-sm-11">
                    <div class="rts-right-section rt-relative">
                        <p class="rt-white mb--40">
                            Since October 2004, Mount Zion Clinic has been blessed to partner with The Luke Society—a Christian ministry that works internationally with indigenous medical professionals to bring healing and hope in Jesus’ name.

Through this partnership, Mount Zion Clinic has not only strengthened its core mission but also established rural clinics in the villages of Tingoh and Okwala providing medical care, health education, and spiritual encouragement in communities with limited access to healthcare.
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

</x-guest-layout>