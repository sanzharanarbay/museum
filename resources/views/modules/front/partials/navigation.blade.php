<header id="header" id="home">
    <div class="container header-top">
        <div class="row">
            <div class="col-6 top-head-left">
                <ul>
                    <li><a href="{{url('/')}}">Visit Us</a></li>
                    <li><a href="#">Buy Ticket</a></li>
                </ul>
            </div>
            <div class="col-6 top-head-right">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{url('/')}}"><img src="{{asset('frontend/assets/img/logo.png')}}" alt="Logo" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/about')}}">About</a></li>
                    <li><a href="{{url('/virtual-tour')}}">Virtual Tour</a></li>
                    <li><a href="{{url('/gallery')}}">Gallery</a></li>
                    <li><a href="{{url('/events')}}">Events</a></li>
                    <li><a href="{{url('/museumitems')}}">Museum Items</a></li>
                    <li><a href="{{url('/news')}}">News</a></li>
                    <li><a href="{{url('/contact')}}">Contact</a></li>
                    <li>
                        @if (Route::has('login'))
                            @auth
                                <a  href="{{ url('/home') }}">Home</a>
                            @else
                                <a  href="{{ route('login') }}">Login</a>
                            @endauth
                        @endif
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
