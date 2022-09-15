<!doctype html>
<html class="no-js" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ahmed Saeid Fitness</title>
    <meta name="description"
        content="Ahmed Saeid Fitness - احمد سعيد شاكر مدرب كمال اجسام و لياقة بدنيه لاكثر من 5 سنوات، هساعدك تحقق هدفك و توصل للجسم المثالى، لو عاوز تغير حياتك ابدأ دلوقتى.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">

    <meta name="google-site-verification" content="pkzt_4JjIFRFUYJirSvNBD9JOhSVQXsaJ1nXHpPVeZM" />

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/allcss.css">

    <style>
        html,
        body {
            overflow-x: hidden !important;
        }

        button {
            background-color: rgb(23, 23, 23) !important;
        }

        body {
            background-image: url('/images/wolf.png') !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: contain !important;
            background-attachment: fixed !important;
        }

        .navbar-toggler {
            color: rgba(0, 0, 0, .5) !important;
            border-color: rgba(0, 0, 0, .1) !important;
            padding: 0.25rem 0.75rem !important;
            font-size: 1.25rem !important;
            line-height: 1 !important;
            background-color: #FFE22D !important;
            border: 1px solid transparent !important;
            border-radius: 0.25rem !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        @media (max-width: 575.98px) {
            .navbar-brand {
                margin-left: 0% !important;
            }

            .navbar-collapse ul {
                align-items: start !important;
                margin-right: 10% !important;
            }

            .navbar-collapse ul li {
                margin-left: 0% !important;
                margin-right: 0 !important;
            }

            .slider {
                height: 350px;
            }

            h1 {
                font-size: 35px !important;
            }

        }
    </style>

    @yield('style')
</head>

<body class="black-bg">
    <!-- ? Preloader Start -->
    <div class="preload">
        <div class="loader">Loading...</div>
    </div>
    <!-- Preloader Start -->

    {{-- navbar --}}
    @include('includes.navbar')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('includes.footer')

    <!-- Scroll Up -->
    <div id="back-top" style="z-index: 999">
        <a title="Go to Top" href="#" style="color: white"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="/assets/js/alljs.js"></script>

    <script>
        // preloader function
        $(window).on("load", function() {
            $(".preload").fadeOut("slow");
        });
    </script>

    @yield('script')
</body>

</html>
