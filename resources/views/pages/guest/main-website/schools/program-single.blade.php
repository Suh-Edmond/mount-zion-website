@section('title', 'Mount Zion | '.$program->name)

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"  style="background-image: url('{{ asset($school->image_path) }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="..">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">program details</li>
                        </ul>
                        <h2 class="section-title">{{$program->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- program content -->
    <div class="rts-program rts-section-padding">
        <div class="container">
            <div class="rts-program-single-header">
                <div class="row align-items-center g-3">
                    <div class="col-lg-6">
                        <h3 class="rts-section-title">The Accounting program offers a Bachelor of Science in Accounting.</h3>
                    </div>
                    <div class="col-lg-6">
                        <p class="rts-section-description">The program continues to attract students from all ethnic, racial, and cultural backgrounds as they recognize ways that Africana Studies provides them with a forum to examine the intellectual life, the historical experience, and the cultural understanding of one of this country’s largest racial minority groups.</p>
                    </div>
                </div>
            </div>
            <div class="rts-program-description">
                <div class="row sticky-coloum-wrap">
                    <div class="col-lg-8">
                        <div class="program-description-area" id="curriculum">
                            <div class="program-big-thumb">
                                <img src="/{{$program->image_path}}" alt="program">
                            </div>
                            <div class="program-about">
                                <h4 class="title">About The Program</h4>
                                <div>
                                    {{$program->about}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-lg-4 sticky-coloum-item">
                        <div class="program-sidebar">
                            <!-- curriculum -->
                            <div class="program-curriculum">
                                <h6 class="heading-title">Admission Eligibility</h6>
                                <div class="program-menu">
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('main.admission').'#eligibility'}}"><span><i class="fa-light fa-arrow-right"></i></span>View Eligibility</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- contact info -->
                            <div class="program-info">
                                <h5>{{$program->school->name}}</h5>
                                <p>{{$program->school->address}}</p>
                                <div class="contact-info">
                                    <h5>Contact:</h5>
                                    <a href="mailto:barry.mountzion@info.com">{{$program->school->email}}</a>
                                    <a href="callto:+237">{{$program->school->telephone}}</a>
                                </div>
                                <div class="social-info">
                                    <h5>Social Info:</h5>
                                    <div class="social-info-link">
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- program content end -->
</x-guest-layout>
