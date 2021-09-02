<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css')}}">
    @stack('styles')
</head>

<body>
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('assets/img/loader/loader.svg')}}" alt="loader">
                    </div>
                </div>
            </div>

            @include('includes.header')

            <div class="app-container">
                @if(auth()->user()->type == 'officer')
                @include('includes.officer_sidebar')
                @elseif(auth()->user()->type == 'customer')
                @include('includes.customer_sidebar')
                @endif
                <div class="app-main" id="main">
                    @yield('content')
                </div>
            </div>

            @include('includes.footer')

        </div>
    </div>
    <script src="{{ asset('assets/js/vendors.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    @stack('scripts')
</body>

</html>