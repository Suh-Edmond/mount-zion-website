@section('title', 'Events')

<x-guest-layout>
    <!-- BREADCRUMB AREA -->
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" style="background-image: url(assets/images/event/graduation.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('main.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ul>
                        <h2 class="section-title">Events</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BREADCRUMB AREA END -->

    <!-- university event list -->
    <div class="rts-event rts-section-padding">
        <div class="container">
            <div class="row justify-content-sm-center justify-content-md-start g-5">
                @foreach($events as $event)
                <!-- single event item -->
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-event">
                        <div class="event single-event__content">
                            <div class="event__thumb">
                                <img src="{{asset($event->poster_url)}}" alt="event thumbnail">
                            </div>
                            <div class="event__meta">
                                <div class="event__meta--da">
                                    <div class="event-date">
                                        <span><i class="fal fa-calendar"></i></span>
                                        <span>{{ date('F j, Y', strtotime($event->event_date)) }}</span>
                                    </div>
                                    <div class="event-time">
                                        <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                                        <span>{{ date('g:i A', strtotime($event->event_time)) }}</span>
                                    </div>
                                </div>
                                <h5 class="event__title"> <a href="{{ url()->current() . '/' . $event->slug}}">{{ $event->title }}</a></h5>
                            </div>
                            <div class="event-place">
                                <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                                <span>{{ $event->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single event item end -->

                @endforeach
            </div>
        </div>
    </div>
    <!-- university event list end -->
</x-guest-layout>