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
                        Museum Artifacts
                    </h1>
                    <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>
                        <a href="{{url('/museum-items')}}"> Museum Items</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start upcoming-exibition Area -->
    <section class="upcoming-exibition-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Ongoing Exhibitions from the scratch</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{$item->image}}" alt="">
                    </div>
                    <p class="date">10 Jan 2018</p>
                    <a href="#"><h4>{{$item->name}}</h4></a>
                    <p>
                      {{$item->description}}
                    </p>
                    <div class="meta-bottom d-flex justify-content-start">
                        <p class="price">$ {{$item->price}}</p>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End upcoming-exibition Area -->

@endsection



@push('scripts')


@endpush
