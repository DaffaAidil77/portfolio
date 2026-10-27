<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @php $sideProfile = \App\Models\Profile::first(); @endphp
    <title>Portofolio {{ $sideProfile->name ?? 'Dapa' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets-portfolio/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-portfolio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets-portfolio/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-portfolio/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-portfolio/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-portfolio/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-portfolio/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets-portfolio/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="{{ $sideProfile && $sideProfile->photo ? asset('assets-portfolio/img/' . $sideProfile->photo) : asset('assets-portfolio/img/my-profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
        </div>

        <a href="#hero" class="logo d-flex align-items-center justify-content-center">
            <h1 class="sitename">{{ $sideProfile->name ?? 'Dapa' }}</h1>
        </a>

        <div class="social-links text-center">
            <a href="https://instagram.com/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
                <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
                <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
                <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        @if($errors->any())
        <div class="alert alert-danger m-3" style="position:relative; z-index:9999">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <footer id="footer" class="footer position-relative light-background">
        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $sideProfile->name ?? 'Dapa' }}</strong> <span>All Rights Reserved</span></p>
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets-portfolio/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-portfolio/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets-portfolio/js/main.js') }}"></script>

</body>

</html>