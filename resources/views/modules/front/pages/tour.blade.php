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
                        Exhibition halls
                    </h1>
                    <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="ticket.html"> Tickets</a></p>
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
                        <h1 class="mb-10">Exhibition halls</h1>
                        <p>To view a 3D panorama of an object, select the required exhibition hall</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_archeology.jpg'}}" alt="img_zal_archeology  ">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/archeology/"><h4>Hall of archeology</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_archeology2.jpg'}}" alt="img_zal_archeology2">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/archeology2/"><h4>Hall of Archeology (portal)</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_newhistory.jpg'}}" alt="img_zal_newhistory">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/newhistory/"><h4>Hall "New history"</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_ksro.jpg'}}" alt="img_zal_ksro">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/XXvek/"><h4>Hall of the history of the 20th century</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_oilgas.jpg'}}" alt="img_zal_oilgas">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/oilgas/"><h4>Oil Industry Hall</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_newkazakhstan.jpg'}}" alt="img_zal_newkazakhstan">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/kazakhstan/"><h4>Hall "Modern Kazakhstan"</h4></a>
                </div>

                <div class="col-lg-4 col-md-6 single-exhibition">
                    <div class="thumb">
                        <img class="img-fluid" src="{{'frontend/assets/img/tour/img_zal_kekilbaev.jpg'}}" alt="img_zal_kekilbaev">
                    </div>
                    <a href="https://www.muzey.kz/3d/panorams/kekilbayev/"><h4>Hall about the life and work of Abish Kekilbaev</h4></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End upcoming-exibition Area -->

@endsection



@push('scripts')


@endpush
