@extends('Admin.Layouts.master')
@section('content')
    <div class="page-title d-flex align-items-center justify-content-between flex-wrap">
        <h2>Dashboard</h2>
    </div>
    <div class="cover-inner-content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex align-itesms-center justify-content-between">Sales statistics <i class="bi bi-info-circle"></i></h4>
                    </div>
                    <div class="cover-chart">

                        <div class="chart1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body gradient-layer">
                        <h4 class="card-title d-flex align-itesms-center justify-content-between">New users <i class="bi bi-info-circle"></i></h4>
                        <div class="list-items-v1 fixed-height-270px">
                            <ul>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot green-dot-none">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot green-dot-none">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body gradient-layer">
                        <h4 class="card-title d-flex align-itesms-center justify-content-between">App traffic <i class="bi bi-info-circle"></i></h4>
                        <div class="list-items-v1 fixed-height-270px">
                            <ul>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="m-0 font-weight-600">813</h6>
                                            <p>Facebook</p>
                                        </div>
                                        <p class="font-weight-600 text-black">64 %</p>
                                    </div>
                                    <div class="progress border-radius-10px">
                                        <div class="progress-bar facebook-bar border-radius-10px" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="m-0 font-weight-600">323</h6>
                                            <p>Instagram</p>
                                        </div>
                                        <p class="font-weight-600 text-black">70%</p>
                                    </div>
                                    <div class="progress border-radius-10px">
                                        <div class="progress-bar instagram-bar border-radius-10px" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="m-0 font-weight-600">813</h6>
                                            <p>Google</p>
                                        </div>
                                        <p class="font-weight-600 text-black">64 %</p>
                                    </div>
                                    <div class="progress border-radius-10px">
                                        <div class="progress-bar google-bar border-radius-10px" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="m-0 font-weight-600">813</h6>
                                            <p>Link</p>
                                        </div>
                                        <p class="font-weight-600 text-black">64 %</p>
                                    </div>
                                    <div class="progress border-radius-10px">
                                        <div class="progress-bar link-bar border-radius-10px" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex align-itesms-center justify-content-between">Involvement <i class="bi bi-info-circle"></i></h4>
                        <div class="cover-chart">
                            <div class="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body gradient-layer">
                        <h4 class="card-title d-flex align-itesms-center justify-content-between">New Activity <i class="bi bi-info-circle"></i></h4>
                        <div class="list-items-v1 fixed-height-270px">
                            <ul>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot green-dot-none">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot green-dot-none">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="green-dot">
                                                <img src="assets/images/admin.jpg" alt="">
                                            </div>
                                            <p>Francesca Metts</p>
                                        </div>
                                        <p>21.1k</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('Admin.Partials.script')
<script>
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
            )
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
            )
        window.Promise ||
            document.write(
                '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
            )
    </script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 270,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector(".chart1"), options);
        chart.render();


        var options = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 270,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector(".chart2"), options);
        chart.render();
    </script>
@endsection

