@section('title', 'Mount-Zion')

<x-guest-layout>

    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcrumb-height-full breadcumb-bg" style="background-image: url('{{ asset($school->image_path) }}')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="..">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Schools</li>
                        </ul>
                        <h2 class="section-title">{{ $school->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- content -->
    <div class="rts-faculty-details rts-section-padding">
        <div class="container">
            
            <div class="row g-5 faculty-sub-details rts-section-padding">
                <div class="rts-section mb-4 text-center">
                    <h3 class="rts-section-title">List of Progams</h3>
                </div>


                <div class="search-filter mb--40">
                    <div class="row g-5">
                        <div class="col-lg-5 col-md-6">
                            <div class="category-filter">
                                <h6>Program Type:</h6>
                                <select name="cat-search" id="cat-filter">
                                    @foreach ($programTypes as $programType)
                                    <option value="{{ $programType }}">{{ $programType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="all-program-categ</script>ory">
                    <div class="row g-5">
                        <!-- single item -->
                        @foreach ($programs as $program)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-cat-item">
                                <div class="cat-thumb">
                                    <img src="{{$program->image_path}}" alt="course-thumbnail">
                                    <a href="{{ url()->current() . '/' . $program->slug }}" class="cat-link-btn">{{ $program->tag }}</a>
                                </div>
                                <div class="cat-meta">
                                    <div class="cat-title">
                                        <a href="{{ url()->current() . '/' . $program->slug }}">{{ $program->name }}</a>
                                    </div>
                                    <div class="cat-link">
                                        <a href="{{ url()->current() . '/' . $program->slug }}" class="cat-link-arrow"><i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="rts-load-more-btn ">
                        <a href="#" class="rts-theme-btn primary lh-100">Load More</a>
                    </div>
                </div>
            </div>
        </div>

</x-guest-layout>