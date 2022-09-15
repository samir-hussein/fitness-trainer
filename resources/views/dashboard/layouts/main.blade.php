<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Ahmed Saeid Fitness</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/dashboard_assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/dashboard_assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/dashboard_assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/dashboard_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/dashboard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/dashboard_assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="/dashboard_assets/css/dataTables.bootstrap5.min.css">

    <!-- Page CSS -->
    @yield('style')

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
    </style>

    <!-- Helpers -->
    <script src="/dashboard_assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/dashboard_assets/js/config.js"></script>
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            {{-- sidebar --}}
            @include('dashboard.includes.sidebar')

            <!-- Layout container -->
            <div class="layout-page">

                {{-- navbar --}}
                @include('dashboard.includes.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                    <!-- / Content -->

                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2022
                                , developed with ❤️ by <a href="https://www.facebook.com/samirHussein011"
                                    target="_blank" class="footer-link fw-bolder">Samir Ebrahim</a>
                            </div>
                        </div>
                    </footer>

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/dashboard_assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/dashboard_assets/vendor/libs/popper/popper.js"></script>
    <script src="/dashboard_assets/vendor/js/bootstrap.js"></script>
    <script src="/dashboard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/dashboard_assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/dashboard_assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/dashboard_assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/dashboard_assets/js/dashboards-analytics.js"></script>

    <script src="/dashboard_assets/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard_assets/js/dataTables.bootstrap5.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function activeLink() {
            var pathname = window.location.pathname;
            pathname = pathname.split('/')[2];
            $('.menu-item').removeClass('active');
            $('.' + pathname).addClass('active');
        }
        activeLink();

        $.ajax({
            url: '/dashboard/new-clients/number',
            type: 'get',
            success: function(data) {
                $('#books_clients').removeClass('d-none');
                $('#books_clients').html(data.data.books_clients);

                $('#clients').removeClass('d-none');
                $('#clients').html(data.data.clients);
            }
        });
    </script>

    @yield('script')
</body>

</html>
