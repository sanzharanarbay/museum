<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Geronimo Lap Admin Panel</title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('modules.admin.partials.style')
    @stack('styles')
</head>
<body>
         @include('modules.admin.partials.sidebar')
             <div id="right-panel" class="right-panel">
                @include('modules.admin.partials.header')
                 <div id="app" class="container">
                     @yield('content')
                 </div>
                        @include('modules.admin.partials.footer')
            </div>

         <script src="{{ asset('js/app.js') }}" defer></script>
        @include('modules.admin.partials.script')
        @stack('scripts')
</body>
</html>
