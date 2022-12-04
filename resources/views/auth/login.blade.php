<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from askbootstrap.com/preview/vidoe-v2-3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 13:22:15 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Askbootstrap">
        <meta name="author" content="Askbootstrap">
        <title>VIDOE - Video Streaming Website HTML Template</title>

        <link rel="icon" type="image/png" href="img/favicon.png">

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <link href="css/osahan.css" rel="stylesheet">

        <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
    </head>

    <body class="login-main-body">
        <section class="login-main-wrapper">
            <div class="container-fluid pl-0 pr-0">
                <div class="row no-gutters">
                    <div class="col-md-5 p-5 bg-white full-height">
                        <div class="login-main-left">
                            <div class="text-center mb-5 login-main-left-header pt-4">
                                <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                                <h5 class="mt-3 mb-3">Welcome to Vidoe</h5>
                                <p>It is a long established fact that a reader <br> will be distracted by the readable.
                                </p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Enter Email" class="form-control"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign
                                                In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-5">
                                <p class="light-gray">Don’t have an account? <a href="register.html">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="login-main-right bg-white p-5 mt-5 mb-5">
                            <div class="owl-carousel owl-carousel-login">
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br>
                                            it to make a type specimen book. It has survived not <br>only five centuries
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br>
                                            it to make a type specimen book. It has survived not <br>only five centuries
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-login-card text-center">
                                        <img src="img/login.png" class="img-fluid" alt="LOGO">
                                        <h5 class="mt-5 mb-3">Create GIFs</h5>
                                        <p class="mb-4">when an unknown printer took a galley of type and scrambled<br>
                                            it to make a type specimen book. It has survived not <br>only five centuries
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="vendor/jquery/jquery.min.js" type="3774e68f4fb4eafaca8aebd5-text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="3774e68f4fb4eafaca8aebd5-text/javascript">
        </script>

        <script src="vendor/jquery-easing/jquery.easing.min.js" type="3774e68f4fb4eafaca8aebd5-text/javascript">
        </script>

        <script src="vendor/owl-carousel/owl.carousel.js" type="3774e68f4fb4eafaca8aebd5-text/javascript"></script>

        <script src="js/custom.js" type="3774e68f4fb4eafaca8aebd5-text/javascript"></script>
        <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="3774e68f4fb4eafaca8aebd5-|49" defer=""></script>
        <script defer
            src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
            integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
            data-cf-beacon='{"rayId":"76f2734a887a41b8","version":"2022.11.3","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'
            crossorigin="anonymous"></script>
    </body>

    <!-- Mirrored from askbootstrap.com/preview/vidoe-v2-3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 13:22:15 GMT -->

</html>