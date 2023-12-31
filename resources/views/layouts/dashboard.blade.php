<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/admin/images/favicon.png">
    <title>Dashboard</title>
    <!-- Custom CSS -->
    <link href="/assets/admin/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/assets/admin/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/admin/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/admin/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/assets/admin/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="/assets/dist/css/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('vendor.alert')

        @include('components.header')

        @include('components.sidebar')

        <div class="page-wrapper">
            
            @yield('content')
            
            @include('components.footer')
        </div>
    </div>
    <script src="/assets/admin/libs/jquery/dist/jquery.min.js?v=1"></script>
    <script src="/assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/assets/dist/js/pages/chartjs/chartjs.init.js?v=5"></script>
    <script src="/assets/admin/libs/chart.js/dist/Chart.min.js?v=4"></script>
    <script src="/assets/dist/js/app-style-switcher.js"></script>
    <script src="/assets/dist/js/feather.min.js"></script>
    <script src="/assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/assets/admin/extra-libs/c3/d3.min.js"></script>
    <script src="/assets/admin/extra-libs/c3/c3.min.js"></script>
    <script src="/assets/admin/libs/chartist/dist/chartist.min.js"></script>
    <script src="/assets/admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/assets/admin/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/admin/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="/assets/admin/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="/assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>