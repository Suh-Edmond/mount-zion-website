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
                    <h4 class="rts__section--title">
                        Mount Zion Clinic in partnership with The Luke Society Intl. 
                        medical missions to Tingo Okwala Cameroon
                    </h4>
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

    <section class="rts-campus-tour rts-section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="rts-video-section-text rt-center mx-3">
                        <a href="https://www.lukesociety.org/bamenda-cameroon" class="mt--15 about-btn rts-nbg-btn btn-arrow">Learn more <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                        <p class="rt-white mb--40">
                            Since October 2004, Mount Zion Clinic has been blessed to partner with The Luke Society—a Christian ministry that works internationally with indigenous medical professionals to bring healing and hope in Jesus’ name.

Through this partnership, Mount Zion Clinic has not only strengthened its core mission but also established rural clinics in the villages of Tingoh and Okwala providing medical care, health education, and spiritual encouragement in communities with limited access to healthcare.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>