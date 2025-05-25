@section('title', 'Events')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url('{{asset($event->poster_url)}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events Details</li>
                        </ul>
                        <h2 class="section-title">{{$event->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->



    <!-- event details -->
    <div class="rts-event-details pt--120">
        <div class="container">
            <div class="row justify-content-md-center justify-content-start">
                <div class="col-lg-7 col-md-10">
                    <div class="event-details">
                        <div class="event-details__content">
                            <div class="event-details__content--thumb">
                                <img src="{{asset($event->poster_url)}}" alt="event details">
                            </div>
                            <div class="event-details__content--text">
                                <div class="rts-section">
                                    <h4 class="rts-section-title">About The Event</h4>
                                    <p class="description">{{$event->about}}</p>
                                </div>
                            </div>
                            <div class="event-details__content--feature">
                                @foreach ($event->eventSections as $section)
                                <div class="single-feature">
                                    <p class="feature-heading">{{$section->title}}:</p>
                                    <p class="feature-description">{{$section->body}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-10">
                    <div class="event-sidebar">
                        <!-- event information -->
                        <div class="event-information">
                            <h5 class="rts-section-title">Event Information</h5>
                            <div class="single-info">

                                <div class="info-repeat">
                                    <div class="left-side"><span><i class="fa-regular fa-calendar-week"></i></span> Date:</div>
                                    <div class="right-side">
                                        <span class="desc price">{{ date('F j, Y', strtotime($event->event_date)) }}</span>
                                    </div>
                                </div>


                                <div class="info-repeat">
                                    <div class="left-side"><span><i class="fa-light fa-money-check-dollar"></i></span> Time:</div>
                                    <div class="right-side">
                                        <span class="desc">{{ date('g:i A', strtotime($event->event_time)) }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- event venue -->
                        <div class="event-venue mt--50">
                            <h5 class="rts-section-title">Event Venue</h5>
                            <div class="event-venu-information">
                                <div class="single-info">
                                    <!-- single repeat item -->
                                    <div class="info-repeat">
                                        <div class="left-side bold">Venue:</div>
                                        <div class="right-side">
                                            <span class="desc">{{$event->venue}}</span>
                                        </div>
                                    </div>
                                    <!-- single repeat item -->
                                    <div class="info-repeat">
                                        <div class="left-side bold">Location:</div>
                                        <div class="right-side">
                                            <span class="desc location">{{$event->location}}</span>
                                        </div>
                                    </div>
                                    <!-- single repeat item -->
                                    <div class="info-repeat">
                                        <div class="left-side bold">Phone Number:</div>
                                        <div class="right-side">
                                            <span class="desc"><a href="{{'callto:'.$event->phone}}">{{$event->phone}}</a></span>
                                        </div>
                                    </div>
                                    <!-- single repeat item -->
                                    <div class="info-repeat">
                                        <div class="left-side bold">Web Site:</div>
                                        <div class="right-side">
                                            <span class="desc">
                                                <a href="{{$event->website}}">{{$event->website}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- book button -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- event details end -->
    <!-- event speaker -->
    <div class="rts-event-speaker mt--40 rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section">
                    <h3 class="rts-section-title">Event Speakers</h3>
                </div>
            </div>
            <!-- event speaker list -->
            <div class="row g-5">
                @foreach ($event->speakers as $speaker)
                <!-- single speaker item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="event-speaker">
                        <div class="event-speaker__details">
                            <div class="speaker-thumb">
                                <img src="{{asset($speaker->picture)}}" alt="speaker-thumb">
                                <div class="speaker-social-link">
                                </div>
                            </div>
                            <div class="speaker-meta">
                                <h5 class="speaker__name"><a href="faculty-details.html">{{$speaker->name}}</a></h5>
                                <span class="designation">{{$speaker->title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single speaker item end -->
                @endforeach

            </div>
        </div>
    </div>
    <!-- event speaker end -->

    <!-- reunion gallery -->
    <div class="rts-gallery rts__light rts-section-padding ">
        <div class="container">
            <div class="row">
                <div class="rts__section--wrapper v__5">
                    <h2 class="rts__section--title">Gallery</h2>
                </div>
            </div>
            <div class="gallery-area">
                <div class="row g-5">
                    @foreach ($event->eventGallery as $image)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <a href="{{asset($image->file_path)}}" class="single-gallery__item">
                                <img src="{{asset($image->file_path)}}" alt="gallery">
                                <div class="single-gallery__icon">
                                    <i class="fa-light fa-circle-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- reunion gallery end -->

</x-guest-layout>