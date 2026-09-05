<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mount Zion Higher Insstitute') </title>

    @include('meta::manager', [
    'title' => 'Mount Zion Clinic, Mount Zion Higher Institutes, Bamenda, Buea',
    'description' => "Mount Zion Clinic is a leading medical facility in Bamenda, Cameroon, committed to delivering
    compassionate, high-quality, and affordable healthcare to over 300,000 residents in the region. Since our founding
    in September 1992, we have grown into a trusted institution known for integrity, professionalism, and holistic
    care.",
    'geo_region' => 'Vicky Street (Near Guarantee Express) Bamenda, Cameroon, Cameroon, Street One, Great Soppo Buea -
    Cameroon',
    'keywords' => 'Clinic, Higher Institutes, HND. Bachelors, Nursing, Special Care Nursing Programs, Paediatrics, and
    Minor Surgeries, Obstetrics and Gynaecology, Health Care Assistant, Community health outreach, Midwifery, Outpatient
    consultations, Antenatal and maternity care, In-patient care with 20-bed unit, Outpatient consultations, Laboratory
    services, Lukes, We Care for the Whole Man: Body, Soul, and Spirit, Director of Luke Society Cameroon, Dr. Paul,
    Medical Missions to Tingo Okwala, Okwala',
    'type' => 'website',
    'image' => asset('images/resized_logo.png'),
    'site_name' => 'Mount Zion'

    ])

    <!-- Scripts -->

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.min.css') }}">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <!-- metismenu scss -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/metismenu.css') }}">
    <!-- nice select js -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.css') }}">
    <!-- custom style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/application-loader.css') }}">
</head>

<body class="page">
    @include('components.header')
    <main>
        {{-- <div id="apploader" style="display:none;">
            <div class="apploader"></div>
        </div> --}}
        {{ $slot }}

    </main>
    @include('components.footer')

    <!-- scripts -->
    <!-- jquery js -->
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
    <!-- bootstrap 5.0.2 -->
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <!-- jquery ui js -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/vendor/waw.js') }}"></script>
    <!-- mobile menu -->
    <script src="{{ asset('assets/js/vendor/metismenu.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/vendor/magnifying-popup.js') }}"></script>
    <!-- swiper JS 10.2.0 -->
    <script src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
    <!-- counterup -->
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoint.js') }}"></script>
    <!-- isotop mesonary -->
    <script src="{{ asset('assets/js/plugins/isotop.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sticky-sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/resize-sensor.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/twinmax.js') }}"></script>
    <!-- dymanic Contact Form -->
    <script src="{{ asset('assets/js/plugins/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
    <!-- main Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/application-loader.js') }}"></script>
</body>

</html>
