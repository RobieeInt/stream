<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    {{ env('APP_NAME') }}
  </title>
  <meta content="Tempat Konsultasi Masalah Hukum, Pidana, Perdata , Likuidator. melayani permasalahan hukum perusahaan maupun perorangan" name="description">
  <meta content="Pengacara Hukum, Konsultasi Hukum, Konsultasi Hukum Gratis, Konsultasi Pidana, Konsultasi Penangkapan, Masalah Hukum Indonesia" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('maa/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('maa/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('maa/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('maa/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('maa/assets/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('maa/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('maa/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('maa/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('maa/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="page-index">

  <!-- ======= Header ======= -->
  @include('landing.layouts.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('landing.layouts.hero')
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= Why Choose Us Section ======= -->
    @include('landing.layouts.whychoose')
    <!-- End Why Choose Us Section -->

    <!-- ======= Our Services Section ======= -->
    @include('landing.layouts.services')
    <!-- End Our Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <!-- End Features Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    @include('landing.layouts.recentblogs')
    <!-- End Recent Blog Posts Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('landing.layouts.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('maa/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('maa/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('maa/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('maa/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('maa/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('maa/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('maa/assets/js/main.js') }}"></script>

   <!--Script WA-->
   <script defer data-key="0db77df7-6ad2-4ad9-a72e-94732241f6ee" src="https://widget.tochat.be/bundle.js"></script>

</body>

</html>
