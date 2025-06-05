@section('title', 'Staff')
<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/staff/amphi.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                        </ul>
                        <h2 class="section-title">Staff Directory</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- staff directory -->
    <section class="rts-faculty rts-section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-11">
                    <div class="rts-section mb--50">
                        <h3 class="rts-section-title">Mount Zion Higher Institute Bamenda</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center g-5">
                <!-- single staff item -->
                <div class="col-lg-6 col-md-11">
                    <div class="single-staff">
                        <div class="single-staff__content">
                            <div class="staf-image">
                                <img src="{{asset('assets/images/staff/penn_peace.jpg')}}" alt="staff-image">
                            </div>
                            <div class="staf-info">
                                <h5 class="name">Penn Peace</h5>
                                <span class="designation">Head of Academic Affairs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single staff item -->
                <div class="col-lg-6 col-md-11">
                    <div class="single-staff">
                        <div class="single-staff__content">
                            <div class="staf-image">
                                <img src="{{asset('assets/images/staff/taniform_ruth.jpg')}}" alt="staff-image">
                            </div>
                            <div class="staf-info">
                                <h5 class="name">Taniform Ruth</h5>
                                <span class="designation">Nurse Administrator</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rts-faculty rts-section-padding">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-11">
                    <div class="rts-section mb--50">
                        <h3 class="rts-section-title">Mount Zion Higher Institute Buea</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center g-5">
                <!-- single staff item -->
                <div class="col-lg-6 col-md-11">
                    <div class="single-staff">
                        <div class="single-staff__content">
                            <div class="staf-image">
                                <img src="{{asset('assets/images/staff/ngenyi_chiarrita.jpg')}}" alt="staff-image">
                            </div>
                            <div class="staf-info">
                                <h5 class="name">Ngenyi Chiarrita</h5>
                                <span class="designation">Head of Academic Affairs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single staff item -->
                <div class="col-lg-6 col-md-11">
                    <div class="single-staff">
                        <div class="single-staff__content">
                            <div class="staf-image">
                                <img src="{{asset('assets/images/staff/edong_brenda.jpg')}}" alt="staff-image">
                            </div>
                            <div class="staf-info">
                                <h5 class="name">Edong Brenda</h5>
                                <span class="designation">Nurse Administrator</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- staff directory end -->
</x-guest-layout>