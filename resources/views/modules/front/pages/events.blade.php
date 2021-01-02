@extends('layouts.front')


@push('styles')


@endpush


@section('content')

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Upcoming Events
                    </h1>
                    <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event.html"> Events</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start upcoming-event Area -->
    <section class="upcoming-event-area section-gap" id="events">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Checkout our Upcoming Events</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 event-left">
                    @foreach($events as $event)
                    @if($event->id % 2 == 0)
                    <div class="single-events">
                        <img class="img-fluid" src="{{asset($event->image_path)}}" alt="">
                        <a href="#"><h4>{{$event->name}}</h4></a>
                        <h6><span>{{date('d, F Y', strtotime($event->start_date))}}</span> until {{date('d, F Y', strtotime($event->end_date))}} </h6>
                        <p>
                            {{$event->description}}
                        </p>
                        <p>
                            You can view event by QR code: &nbsp; &nbsp;
                            {!! QrCode::size(100)->generate(URL::to('/upcoming-events'). '/' . $event->unique_id); !!}
                        </p>
                        <a href="{{route('single.event', $event->unique_id)}}" class="primary-btn text-uppercase">View Details</a>
                    </div>
                        @endif
                        <br>
                        @endforeach
                        <br>
                </div>
                <br>
                <br>
                <div class="col-lg-6 event-right">
                    @foreach($events as $event)
                    @if($event->id %2 != 0)
                    <div class="single-events">
                        <a href="#"><h4>{{$event->name}}</h4></a>
                        <h6><span>{{date('d, F Y', strtotime($event->start_date))}}</span> until {{date('d, F Y', strtotime($event->end_date))}}</h6>
                        <p>
                            {{$event->description}}
                        </p>
                        <p>
                            You can view event by QR code: &nbsp; &nbsp;
                            {!! QrCode::size(100)->generate(URL::to('/upcoming-events'). '/' . $event->unique_id); !!}
                        </p>
                        <a href="{{route('single.event', $event->unique_id)}}" class="primary-btn text-uppercase">View Details</a>
                        <img class="img-fluid" src="{{asset($event->image_path)}}" alt="Img">
                    </div>
                        @endif
                        <br>
                    @endforeach
                        <br>
                </div>
                <br>
                <br>
            </div>
        </div>
    </section>
    <!-- End upcoming-event Area -->




@endsection



@push('scripts')


@endpush
