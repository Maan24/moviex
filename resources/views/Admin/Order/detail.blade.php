@extends('Admin.Dashboard.index')
@section('content')
    <div class="page-title d-flex align-items-center justify-content-between flex-wrap">
        <h2>Order details</h2>
    </div>
    <div class="cover-inner-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between border-bottom pb-3 mb-3">
                            <div>
                                <h2 class="font-weight-600">{{ $details->user->username }}</h2>
                                <h6 class="mb-1 font-weight-600">{{ $details->user->country }}</h6>
                                <h6 class="m-0 font-weight-600">P: {{ $details->user->phone }}</h6>
                            </div>
                            <ul>
                                <li><a href="#" class="primary-btn extra-btn-padding-30"
                                        style="background: #0000FE;">Print</a></li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-start justify-content-between border-bottom pb-3 mb-3">
                            <div>
                                <p class="m-0">{{ $details->pharmacy->pharmacy_name }}</p>
                                <p class="m-0">{{ $details->pharmacy->location }}</p>
                                <p class="m-0">131203</p>
                            </div>
                            <div>
                                <p class="m-0"><span class="font-weight-600 text-black">Order Date:</span>
                                    {{ $details->created_at->format('F d,Y') }}</p>
                                <p class="m-0"><span class="font-weight-600 text-black">Order Status:</span>
                                    {{ $details->delivery_status }}</p>
                                <p class="m-0"><span class="font-weight-600 text-black">Order ID:</span>
                                    #{{ $details->id }}
                                </p>
                            </div>
                        </div>
                        <div class="cover-order-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ITEM</th>
                                        <th>QUANTITY</th>
                                        <th>PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $i = 1;
                                    @endphp
                                    @foreach ($details->orderitem as $items)
                                        <tr>
                                            @php
                                                $total += ($items->price * $items->quantity);
                                                $i += 1;
                                            @endphp
                                            <td>{{ $i }}</td>
                                            <td>{{ $items->item_name }}</td>
                                            <td>{{ $items->quantity }}</td>
                                            <td>${{ number_format($items->price) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex align-items-end flex-column justify-content-end">
                            <div class="my-3">
                                <p class="m-0"><span class="font-weight-600 text-black">Sub-total:</span>
                                    {{ number_format($total) }}
                                </p>
                                <p class="m-0"><span class="font-weight-600 text-black">Discout:</span> 12.9%
                                </p>
                                <p class="m-0"><span class="font-weight-600 text-black">VAT:</span> 12.9%</p>
                            </div>
                            <h1 class="font-weight-600">USD {{ number_format($total) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Partials.script')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
