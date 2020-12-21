<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopping App</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
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