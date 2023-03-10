<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Google Font  --}}
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Poppins:wght@400;500;700&amp;display=swap">

        {{-- Plugins CSS --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">

        {{-- Theme CSS --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/flatpickr/css/flatpickr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body class="has-navbar-mobile">
        <div class="mb-2">
            @livewire('topbar')
        </div>

        @yield('content')
        
        @livewire('footer')
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}} "></script>

    <!-- ThemeFunctions -->
    <script src=" {{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}} "></script>
    <script src=" {{ asset('assets/vendor/choices/js/choices.min.js')}} "></script>
    <script src=" {{ asset('assets/vendor/flatpickr/js/flatpickr.min.js')}} "></script>
    <script src=" {{ asset('assets/js/functions.js')}} "></script>
    </body>
</html>
