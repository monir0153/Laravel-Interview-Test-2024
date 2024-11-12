@include('partial.guest-header')

<body>

    <!--login Area start-->
    <section class="loginForm">
        <div class="loginForm__flex">
            <div class="loginForm__left">
                <div class="loginForm__left__inner desktop-center">
                    <div class="loginForm__header">
                        <h2 class="loginForm__header__title">Reset Password</h2>
                        <p class="loginForm__header__para mt-3">Password is reseting , remember your new password</p>
                    </div>

                    <div class="loginForm__wrapper mt-4">
                        <!-- Form -->
                        <form method="POST" class="resetPassword">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="single_input">
                                <label class="label_title">Email</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="text" name="email"
                                        value="{{ old('email', $request->email) }}"
                                        placeholder="Enter your email address">
                                    <div class="icon"><span class="material-symbols-outlined">mail</span></div>
                                </div>
                            </div>
                            <div class="single_input mt-3">
                                <label class="label_title">Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password"
                                        placeholder="Enter your password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>
                            <div class="single_input mt-3">
                                <label class="label_title">Confirm Password</label>
                                <div class="include_icon">
                                    <input class="form--control radius-5" type="password" name="password_confirmation"
                                        placeholder="Re-enter password">
                                    <div class="icon"><span class="material-symbols-outlined">lock</span></div>
                                </div>
                            </div>

                            <div class="btn_wrapper single_input">
                                <button type="submit" class="cmn_btn w-100 radius-5">Submit</button>
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
            $('form.resetPassword').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('password.store') }}",
                    method: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.href = "{{ route('login') }}";
                            }, 500);
                        }
                    },
                    error: function(xhr) {
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
