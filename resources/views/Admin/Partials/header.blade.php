<div id="layoutSidenav_content">
    <main>
        <nav class="sb-topnav navbar navbar-expand bg-white justify-content-between ps-4">
            <a class="d-block d-md-none order-1 order-lg-0 me-4 me-lg-0 text-dark bg-transparent" id="sidebarToggle" href="#!"><i
                    class="material-icons">
                    subject
                </i></a>
            <div class="logo-sm ">
                <img src="{{asset('panel/assets/images/logo.png')}}" alt="">
            </div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 align-items-center">

                <li class="nav-item dropdown profile">
                    <a class="nav-link dropdown-toggle caret-none d-flex align-items-center gap-2" id="navbarDropdown"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img
                            src="{{asset('panel/assets/images/avatar.svg')}}" alt="">
                        <div>
                            <h6 class="font-weight-700 m-0">James Brown</h6>
                            <small class="text-muted">visit profile</small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0" aria-labelledby="navbarDropdown">
                        <!-- <li>
                            <a class="dropdown-item" href="profile.php">
                                <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                                    <img src="assets/images/avatar.svg" alt="student-img">
                                    <div>
                                        <h6> James Alex</h6>
                                        <p>Student</p>
                                    </div>
                                </div>
                            </a>
                        </li> -->
                        <li>
                            <a class="dropdown-item" href="#.">
                                <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                                    <img src="assets/images/icons/edit.svg" alt="">
                                    <p>Edit Profile</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('admin.logout')}}">
                                <div class="cover-profile-dropdown d-flex align-items-center gap-2">
                                    <img src="assets/images/icons/logout.svg" alt="">
                                    <p>logout</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
