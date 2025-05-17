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
            <!-- <div class="row">
                <div class="rts-section mb--60">
                    <h3 class="rts-section-title">Message from Dean</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-8">
                    <div class="faculty-image text-center">
                        <img class="img-fluid mw-100 " src="{{ asset('assets/images/faculty/02.jpg') }}" alt="faculty image">
                        <div class="h5 mb-2 mt-5">Barry Palatnik, Ed.D</div>
                        <span>Assistant Professor</span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="faculty-content-text ms-lg-5 mt-5 mt-lg-0">
                        <p class="h6 mb-
                        4">It's your Time Join to explore</p>
                        <p class="mb-5">The Faculty of Arts Mount Zion University warmly welcomes you to a vast, vivid and vigorous academic landscape of relentless pursuits and superb brilliance.</p>
                        <p class="h6 mb-
                        4">Learn to lead</p>
                        <p class="mb-5">In line with the lifelong motto of Mount Zion 'where leaders are created', FA is devoted to produce accomplished, as well as skilled, learners who can meet the professional requirements of today's local and global job market. Be it an academic seminar or an in-house cricket tournament or a debate festival, students and teachers at FA work hand in hand to make it a success. This is how we make sure that each of our students remains engaged in academic and extracurricular rigors to grow to his or her fullest extent. This is how FA of Mount Zion creates local leaders for the global demands.</p>
                        <p class="h6 mb-
                        4">Challenge yourself to change the world</p>
                        <p>Education becomes meaningful only when it can change the world when necessary. This is what my colleagues and I are working for every single day of the week at FA. I hope that you will find whatever information you may need here and if not please feel free to let me know. I warmly welcome your comments and suggestions. Thank you very much for your kind visit.</p>
                    </div>
                </div>
                <div class="border-top my-60"></div>
                <div class="row align-items-center justify-content-md-center">
                    <div class="col-lg-6 col-md-11">
                        <div class="faculty-content-text me-5">
                            <h4 class="font-32 mb-4">Mission</h4>
                            <p>Create innovative knowledge through intellectual practice, critical engagement, and creative endeavor. It is dedicated to providing students with enriched curriculum that fosters deeper understanding and appreciation of societies, cultures, languages, literatures, and artistic trends to address the contemporary global and local challenges.</p>
                            <h4 class="font-32 mb-4 mt-5">Vision</h4>
                            <p>Create innovative knowledge through intellectual practice, critical engagement, and creative endeavor. It is dedicated to providing students with enriched curriculum that fosters deeper understanding and appreciation of societies, cultures, languages, literatures, and artistic trends to address the contemporary global and local challenges.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-11">
                        <figure class="mt-5 mt-lg-0">
                            <img class="mw-100" src="{{ asset('assets/images/faculty/09.jpg') }}" alt="">
                        </figure>
                    </div>
                </div>
            </div> -->
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
