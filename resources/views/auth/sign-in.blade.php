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

    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Welcome Back</h2>
                        <p class="loginForm__header__para mt-3">Login with your data that you entered during
                            registration.</p>
                    </div>

                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form action="{{ route('login') }}" method="POST" class="custom_form">
                            @csrf
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="text" name="email"
                                        value="{{ old('email') }}" placeholder="Enter your email address">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="single_input">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password"
                                        placeholder="Enter your password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="loginForm__wrapper__remember single_input">
                                <div class="dashboard_checkBox">
                                    <input class="dashboard_checkBox__input" id="remember" name="remember"
                                        type="checkbox">
                                    <label class="dashboard_checkBox__label" for="remember">Remember me</label>
                                </div>
                                <!-- forgetPassword -->
                                <div class="forgotPassword">
                                    <a href="forgot_password.html" class="forgotPass">Forgot passwords?</a>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                                <button type="submit" class="cmn_btn w-100 radius-5">Sign In</button>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Don’t have an account ? </span> <a
                                        href="sign_up.html" class="loginForm__wrapper__signup__btn">Sign Up</a></p>
                                <div class="loginForm__wrapper__another d-flex flex-column gap-2 mt-3">
                                    <a href="javascript:void(0)"
                                        class="loginForm__wrapper__another__btn radius-5 w-100"><img
                                            src="html/assets/img/icon/googleIocn.svg" alt="" class="icon">
                                        Login With Google</a>
                                    <a href="javascript:void(0)"
                                        class="loginForm__wrapper__another__btn radius-5 w-100"><img
                                            src="html/assets/img/icon/fbIcon.svg" alt="" class="icon">Login
                                        With Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="loginForm__right loginForm__bg " style="background-image: url(html/assets/img/login.jpg);">
                <div class="loginForm__right__logo">
                    <div class="loginForm__logo">
                        <a href="index.html"><img src="html/assets/img/logo.webp" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->

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
    <!-- toastr css -->
    <script src={{ asset('html/assets/js/toastr.js') }}></script>
    <!-- main js -->
    <script src={{ asset('html/assets/js/main.js') }}></script>

    <script>
        $(function() {
            $('form.custom_form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let loginUrl = "{{ route('login') }}";
                $.ajax({
                    url: loginUrl,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('dashboard') }}";
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, messages) {
                                messages.forEach(function(message) {
                                    toastr.error(message);
                                });
                            });
                        }
                    }
                });
            })
        });
    </script>

</body>

</html>