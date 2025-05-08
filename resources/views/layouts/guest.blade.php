<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Mount Zion University') </title>

        <!-- Fonts -->
{{--        <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}

        <!-- Scripts -->

        <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
        <!-- fontawesome 6.4.2 -->
        <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
        <!-- bootstrap min css -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <!-- swiper Css 10.2.0 -->
        <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
        <!-- Bootstrap 5.0.2 -->
        <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
        <!-- metismenu scss -->
        <link rel="stylesheet" href="assets/css/vendor/metismenu.css">
        <!-- nice select js -->
        <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
        <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
        <!-- custom style css -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="page">
        @include('components.header')
            <main>
                {{ $slot }}
            </main>
        @include('components.footer')

        <!-- scripts -->
        <!-- jquery js -->
        <script src="assets/js/vendor/jquery.min.js"></script>
        <!-- bootstrap 5.0.2 -->
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <!-- jquery ui js -->
        <script src="assets/js/vendor/jquery-ui.js"></script>
        <!-- wow js -->
        <script src="assets/js/vendor/waw.js"></script>
        <!-- mobile menu -->
        <script src="assets/js/vendor/metismenu.js"></script>
        <!-- magnific popup -->
        <script src="assets/js/vendor/magnifying-popup.js"></script>
        <!-- swiper JS 10.2.0 -->
        <script src="assets/js/plugins/swiper.js"></script>
        <!-- counterup -->
        <script src="assets/js/plugins/counterup.js"></script>
        <script src="assets/js/vendor/waypoint.js"></script>
        <!-- isotop mesonary -->
        <script src="assets/js/plugins/isotop.js"></script>
        <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/plugins/sticky-sidebar.js"></script>
        <script src="assets/js/plugins/resize-sensor.js"></script>
        <script src="assets/js/plugins/twinmax.js"></script>
        <!-- dymanic Contact Form -->
        <script src="assets/js/plugins/contact.form.js"></script>
        <script src="assets/js/plugins/nice-select.min.js"></script>
        <!-- main Js -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
