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
                        Art Gallery
                    </h1>
                    <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery.html"> Gallery</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start gallery Area -->
    <section class="gallery-area section-gap gallery-page-area" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Our Exhibition Gallery</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div id="grid-container" class="row">
                @foreach( $galleries as $gallery)
                <a class="single-gallery" href="{{asset($gallery->image_path)}}"><img class="grid-item" src="{{asset($gallery->image_path)}}"></a>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- End gallery Area -->

@endsection



@push('scripts')


@endpush
