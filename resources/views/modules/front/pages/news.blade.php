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
                        Blog Home
                    </h1>
                    <p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-home.html"> Blog Home</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start blog-posts Area -->
    <section class="blog-posts-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list">
                    @foreach($announcements as $announcement)
                    <div class="single-post">
                        <img class="img-fluid" src="{{$announcement->image_path}}" alt="Image">
                        <ul class="tags">
                            <li><a href="#">Art, </a></li>
                            <li><a href="#">Technology, </a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                        <a href="#">
                            <h1>
                               {{$announcement->title}}
                            </h1>
                        </a>
                        <p>
                            {{$announcement->content}}
                        </p>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6">
                                    <ul>
                                        <li><a href="#"><span class="lnr lnr-heart"></span>	4 likes</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="social-wrap col-lg-6">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-widget search-widget">
                        <form class="example" action="#" style="margin:auto;max-width:300px">
                            <input type="text" placeholder="Search Posts" name="search2">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End blog-posts Area -->



@endsection



@push('scripts')


@endpush
