<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bytedash - Admin Template</title>

    <!-- favicon -->
    <link rel=icon href={{ asset('html/favicons.png') }} sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href={{ asset('html/assets/css/animate.css') }}>
    <!-- bootstrap -->
    <link rel="stylesheet" href={{ asset('html/assets/css/bootstrap.min.css') }}>
    <!-- All Icon -->
    <link rel="stylesheet" href={{ asset('html/assets/css/icon.css') }}>
    <!-- slick carousel  -->
    <link rel="stylesheet" href={{ asset('html/assets/css/slick.css') }}>
    <!-- Select2 Css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/select2.min.css') }}>
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/sweetalert.css') }}>
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/flatpickr.min.css') }}>
    <!-- Country Select Css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/niceCountryInput.css') }}>
    <link rel="stylesheet" href={{ asset('html/assets/css/jsuites.css') }}>
    <!-- Fancy box Css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/fancybox.css') }}>
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href={{ asset('html/assets/css/dashboard.css') }}>
    <!-- toastr css -->
    <link rel="stylesheet" href={{ asset('html/assets/css/toastr.css') }}>
    <!-- dark css -->

</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader_bars">
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- Dashboard start -->
    <div class="body-overlay"></div>
    <div class="dashboard__area">
        <div class="container-fluid p-0">
            <div class="dashboard__contents__wrapper">
                {{--  sidebar --}}
                @include('partial.sidebar')

                <div class="dashboard__right">
                    {{-- header --}}
                    @include('partial.header')
                    <div class="dashboard__body posPadding">
                        <div class="dashboard__inner">
                            <div class="dashboard__inner__item">
                                <div class="dashboard__inner__item__flex">
                                    <div class="dashboard__inner__item__left bodyItemPadding">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard end -->

    <!-- jquery -->
    <script src={{ asset('html/assets/js/jquery-3.6.4.min.js') }}></script>
    <!-- jquery Migrate -->
    <script src={{ asset('html/assets/js/jquery-migrate-3.4.1.min.js') }}></script>
    <!-- bootstrap -->
    <script src={{ asset('html/assets/js/bootstrap.bundle.min.js') }}></script>
    <!-- Slick Slider -->
    <script src={{ asset('html/assets/js/slick.js') }}></script>
    <!-- Plugins Js -->
    <script src={{ asset('html/assets/js/plugin.js') }}></script>

    <!-- Country Select Js -->
    <script src={{ asset('html/assets/js/niceCountryInput.js') }}></script>
    <!-- Multiple Country Select Js -->
    <script src={{ asset('html/assets/js/jsuites.js') }}></script>
    <!-- Fancy box Js -->
    <script src={{ asset('html/assets/js/fancybox.umd.js') }}></script>
    <!-- Map Js -->
    <script src={{ asset('html/assets/js/map/raphael.min.js') }}></script>
    <script src={{ asset('html/assets/js/map/jquery.mapael.js') }}></script>
    <script src={{ asset('html/assets/js/map/world_countries.js') }}></script>
    <!-- toastr css -->
    <script src={{ asset('html/assets/js/toastr.js') }}></script>
    <!-- main js -->
    <script src={{ asset('html/assets/js/main.js') }}></script>
    @stack('scripts')
</body>

</html>
