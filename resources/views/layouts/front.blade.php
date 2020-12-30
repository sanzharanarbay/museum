<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/fav.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Almaty Museum</title>

    @include('modules.front.partials.style')
    @stack('styles')
</head>
<body>
    @include('modules.front.partials.navigation')
    @yield('content')
    @include('modules.front.partials.footer')
    @include('modules.front.partials.script')
    @stack('scripts')
</body>
</html>
