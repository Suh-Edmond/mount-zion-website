@section('title', 'About')

<x-guest-layout>

    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/home/procession.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Academics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Programs</li>
                        </ul>
                        <h2 class="section-title">Programs</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->


    <!-- content -->
    <div class="rts-academic-area rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section">
                    <h3 class="rts-section-title">Programs</h3>
                </div>
            </div>
            <!-- academic top -->
            <div class="search-filter mb--40">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-6">
                        <div class="category-filter">
                            <h6>School:</h6>
                            <select class="school-select" name="cat-search" id="cat-filter">
                                <option value="">all</option>
                                @foreach ($schools as $school)
                                <option value="{{$school->slug}}">{{$school->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="category-filter">
                            <h6>Program Type:</h6>
                            <select class="program-type-select" name="cat-search" id="cat-filter">
                                <option value="">all</option>
                                @foreach ($programTypes as $programType)
                                <option value="{{$programType}}">{{$programType}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-program-category">
                <div class="row g-5" id="program-list">
                    <!-- single item -->
                    @foreach ($programs as $program)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-cat-item">
                            <div class="cat-thumb">
                                <img src="{{ asset($program->image_path) }}" alt="course-thumbnail">
                                <a href="{{ route('main.schools.program.show', ['programSlug' => $program->slug, 'schoolSlug' => $program->school->slug]) }}" class="cat-link-btn">{{ $program->tag }}</a>
                            </div>
                            <div class="cat-meta">
                                <div class="cat-title">
                                    <a href="{{ route('main.schools.program.show', ['programSlug' => $program->slug, 'schoolSlug' => $program->school->slug]) }}">{{ $program->name }}</a>
                                </div>
                                <div class="cat-link">
                                    <a href="{{ route('main.schools.program.show', ['programSlug' => $program->slug, 'schoolSlug' => $program->school->slug]) }}" class="cat-link-arrow"><i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="rts-load-more-btn ">

                    <!-- paginator -->
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>

<script src="{{asset('assets/js/program-filter.js')}}"></script>