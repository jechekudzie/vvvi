<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('website/images/VVVI logo final-01.jpg') }}" rel="icon"/>
    <title>VVVI ltd</title>
    <meta name="description"
          content="VVVI is an international remittance and money transfer service aimed at streamlining and improving how Zimbabweans in the diaspora, especially those in the UK, send money to Zimbabwe and beyond. Our service extends to facilitating local money transfers within Zimbabwe, as well as to South Africa and Botswana, through various payment methods.">
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ============================================= -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Stylesheet
    ============================================= -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}"/>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/font-awesome/css/all.min.css') }}"/>

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/bootstrap-select/css/bootstrap-select.min.css') }}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

    <!-- Currency Flags CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/currency-flags/css/currency-flags.min.css') }}"/>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/owl.carousel/assets/owl.carousel.min.css') }}"/>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/stylesheet.css') }}"/>


    @livewireStyles
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<!-- Document Wrapper
============================================= -->
<div id="main-wrapper">

    <!-- Header
    ============================================= -->
    <header id="header">
        <div class="container">
            <div class="header-row">
                <div class="header-column justify-content-start">
                    <!-- Logo
                    ============================= -->
                    <div class="logo me-3">
                        <a class="d-flex" href="{{ route('website.home')  }}" title="VVVI ltd">
                            <img class="img-responsive" style="width: 121px;" src="{{ asset('website/images/logo.png') }}" alt="VVVI ltd"/>
                        </a>
                    </div>
                    <!-- Logo end -->
                    <!-- Collapse Button
                    ============================== -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav">
                        <span></span> <span></span> <span></span></button>
                    <!-- Collapse Button end -->

                    <!-- Primary Navigation
                    ============================== -->
                    <nav class="primary-menu navbar navbar-expand-lg">
                        <div id="header-nav" class="collapse navbar-collapse">
                            <ul class="navbar-nav me-auto">
                                <li><a href="#">About Us</a></li>
                                <li class="active"><a href="#">Send</a></li>
                                <li><a href="#">Receive</a></li>
                                <li><a href="#">Fees</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Primary Navigation end -->
                </div>
                <div class="header-column justify-content-end">
                    <!-- Login & Signup Link
                    ============================== -->
                    <nav class="login-signup navbar navbar-expand">
                        <ul class="navbar-nav">
                            <li><a href="#">Login</a></li>
                            <li class="align-items-center h-auto ms-sm-3"><a class="btn btn-primary" href="#">Sign
                                    Up</a></li>
                        </ul>
                    </nav>
                    <!-- Login & Signup Link end -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

   @yield('content')

    <!-- Footer
    ============================================= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg d-lg-flex align-items-center">
                    <ul class="nav justify-content-center justify-content-lg-start text-3">
                        <li class="nav-item"><a class="nav-link active" href="#">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Careers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Affiliate</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Fees</a></li>
                    </ul>
                </div>
                <div class="col-lg d-lg-flex justify-content-lg-end mt-3 mt-lg-0">
                    <ul class="social-icons justify-content-center">
                        <li class="social-icons-facebook"><a data-bs-toggle="tooltip" href="http://www.facebook.com/"
                                                             target="_blank" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a data-bs-toggle="tooltip" href="http://www.twitter.com/"
                                                            target="_blank" title="Twitter"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-google"><a data-bs-toggle="tooltip" href="http://www.google.com/"
                                                           target="_blank" title="Google"><i class="fab fa-google"></i></a>
                        </li>
                        <li class="social-icons-youtube"><a data-bs-toggle="tooltip" href="http://www.youtube.com/"
                                                            target="_blank" title="Youtube"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright pt-3 pt-lg-2 mt-2">
                <div class="row">
                    <div class="col-lg">
                        <p class="text-center text-lg-start mb-2 mb-lg-0">Copyright &copy; {{date('Y')}} <a href="#">VVVI ltd</a>.
                            All Rights Reserved.</p>
                    </div>
                    <div class="col-lg d-lg-flex align-items-center justify-content-lg-end">
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a class="nav-link active" href="#">Security</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Back to Top
============================================= -->
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
        class="fa fa-chevron-up"></i></a>

<!-- Video Modal
============================================= -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white ms-auto me-n3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe id="video" src="" allow="autoplay;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal end -->

<!-- Script -->
<!-- Scripts -->
<script src="{{ asset('website/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('website/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/js/theme.js') }}"></script>

<!-- Add these at the end of your body -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>

@livewireScripts
</body>
</html>
