<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>thepharmassist Dashboard</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Gapconcepts" />
    <meta name="copyright" content="" />


  @include('Admin.Partials.styles')
</head>

<body>
    <!-- start side bar -->
    <div class="preloader">
        <div class="d-flex align-items-center justify-content-center height-100vh">
            <div class="spinner-border primary-text" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- <div class="logo d-none d-md-block">
                <img src="assets/images/logo.png" alt="">
            </div> -->
            <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="cover-nav">
                        <div class="nav">
                            <a class="nav-link active" href="{{route('admin.dashboard')}}">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/dashboard.svg')}}" alt=""></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{route('admin.user.index')}}">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/user.svg')}}" alt="">
                                </div>
                                Users

                            </a>
                            <a class="nav-link" href="{{route('admin.pharmacy.index')}}">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/Pharmacies.svg')}}" alt="">
                                </div>
                                Pharmacies
                            </a>
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/Orders.svg')}}" alt="">
                                </div>
                                Orders
                            </a>
                            <a class="nav-link" href="notification.php">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/Notifications.svg')}}" alt="">
                                </div>
                                Notifications
                            </a>

                            <a class="nav-link" href="report.php">
                                <div class="sb-nav-link-icon"><img src="{{asset('panel/assets/images/icons/Reports.svg')}}" alt="">
                                </div>
                                Reports
                            </a>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
