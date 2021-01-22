<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping App</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    @php
        // any valid date in the past
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        // always modified right now
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        // HTTP/1.1
        header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
        // HTTP/1.0
        header("Pragma: no-cache");
    @endphp
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <!-- include css -->
    @include('frontend.partials.stylesheet')

    <!-- include css -->

</head>

<body>

    <div class="main-wrapper">

       <!-- header -->
         @include('frontend.partials.header')
         @include('frontend.partials.flash-message')
        @yield('content')




        <!-- footer -->
         @include('frontend.partials.footer')
        <!-- footer -->



    </div>

   <!-- js -->
     @include('frontend.partials.script')
     
     {{-- pagelevel javascript --}}
     @yield('page-level-javascript')
</body>

</html>