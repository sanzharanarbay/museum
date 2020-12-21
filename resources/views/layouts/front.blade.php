<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Geromino Lap</title>
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
