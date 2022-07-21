@extends('Admin.Layouts.master')
@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between flex-wrap">
            <h2>Pharmacies</h2>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="search-bar">
                    <form action="">
                        <div class="form-group position-relative mb-0 ">
                            <div class=" dataTables_filter">
                                <input type="search" class="form-control" placeholder="Search keyword" id="custom-filter">
                                <i class="material-icons">
                                    search
                                </i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cover-inner-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title d-flex align-itesms-center justify-content-between">Pharmacies <i
                                    class="bi bi-info-circle"></i></h4>
                            <div class="cover-datatable">
                                <table class="table align-middle" id="userdatatable">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Country</th>
                                            <th>Socials</th>
                                            <th>Orders fulfilled</th>
                                            <th>Online</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pharmacy as $pharma)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 ps-4">
                                                        <div class="green-dot green-dot-none">
                                                            <img src="{{ asset($pharma->image) }}"
                                                                class="border-radius-50px" alt=""
                                                                style="width: 45px; height: 45px; object-fit: cover">
                                                        </div>
                                                        <p class="m-0 font-weight-600 text-black">
                                                            {{ $pharma->pharmacy_name }}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="assets/images/usa.png" alt="" class="w-auto">
                                                        {{ $pharma->location }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="social-links d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                                    </div>
                                                </td>
                                                <td>650</td>
                                                <td>5 min ago</td>
                                                <td>
                                                    <div class="cover-table-btn">
                                                        <ul>
                                                            <li class="dropdown position-relative">
                                                                <a href="#" class="dropdown-toggle caret-none"
                                                                    data-bs-toggle="dropdown" role="button"
                                                                    id="navbarDropdown"><i class="material-icons">
                                                                        more_vert
                                                                    </i></a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="navbarDropdown">
                                                                    <li>
                                                                        <a href="#." class="dropdown-item">Details</a>
                                                                    </li>


                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Admin.Partials.script')
    @endsection
