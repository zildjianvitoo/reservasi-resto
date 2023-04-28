<!doctype html>
<html lang="en">
<head>
    <title>Lupa Password - Roemah Elektro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
<script>
    var alertMessage = "{{ session('message') }}";
    if(alertMessage) {
        alert(alertMessage);
    }
</script>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Lupa Password</h3>
                            </div>
                        </div>
                        <form action="{{ route('forget-password.process') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="username" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" required>
                                <label class="form-control-placeholder" for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password Baru</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
                            </div>
                        </form>
                        <p class="text-center">Belum memiliki akun? <a href="{{ route('register.index') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    (function($) {

        "use strict";

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    })(jQuery);

</script>

</body>
</html>

