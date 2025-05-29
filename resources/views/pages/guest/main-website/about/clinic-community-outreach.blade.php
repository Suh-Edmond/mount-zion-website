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
                    <h2 class="rts__section--title">
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

    <div class="rts-funfact rts-section-padding">

    </div>

</x-guest-layout>