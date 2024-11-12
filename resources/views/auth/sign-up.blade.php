@include('partial.guest-header')

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
                        <form class="signUp" method="POST">
                            @csrf
                            <div class="single_input">
                                <label class="label_title">Name</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="text" name="name"
                                        placeholder="Enter your Full Name">
                                    <div class="icon"><span class="material-symbols-outlined">person</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">User name</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" name="username" type="text"
                                        placeholder="Enter user name">
                                    <div class="icon"><span class="material-symbols-outlined">person</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" name="email" type="email"
                                        placeholder="Enter your email or Username">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password"
                                        placeholder="Enter your password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="single_input">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password_confirmation"
                                        placeholder="Re-enter password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="btn_wrapper single_input">
                                <button type="submit" class="cmn_btn w-100 radius-5">Sign Up</button>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <p class="loginForm__wrapper__signup"><span>Already have an Account? </span> <a
                                        href="{{ route('login') }}" class="loginForm__wrapper__signup__btn">Sign In</a>
                                </p>
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

    @include('partial.guest-footer')
    <script>
        $(function() {
            $('form.signUp').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('register') }}",
                    method: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        if (response.status == true) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('dashboard') }}";
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr)
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, messages) {
                                messages.forEach(function(message) {
                                    toastr.error(message);
                                });
                            });
                        } else {
                            toastr.error(xhr.responseJSON.message);
                        }
                    }
                });
            })
        });
    </script>
</body>

</html>
