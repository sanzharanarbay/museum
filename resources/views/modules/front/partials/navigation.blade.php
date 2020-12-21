<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/menu')}}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/reservation')}}">Reservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/staff')}}">Staff</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/gallery')}}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            @endauth
                        @endif
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
