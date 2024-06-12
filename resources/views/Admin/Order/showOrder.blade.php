@extends('layouts.base')

@section('title', 'Dashboard Detail Order Produk')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
<!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Order Detail</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">Order Detail</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('Admin.Order.alert')
                    </div>
                </div>
                <h2 class="section-title">Order Detail</h2>
                <p class="section-lead">
                <div>Total Price {{ $order->total_price }}</div>
                <div>Transaction Time {{ $order->transaction_time }}</div>
                <div>Total Item {{ $order->total_item }}</div>

                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
                            </div>
                            <div class="card-body">



                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>

                                        </tr>
                                        @foreach ($orderItems as $item)
                                            <tr>

                                                <td>{{ $item->product->name }}</td>
                                                </td>
                                                <td>
                                                    {{ $item->product->price }}
                                                </td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td>
                                                    {{ $item->total_price }}

                                                </td>

                                            </tr>
                                        @endforeach


                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('library/prismjs/prism.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/prismjs/prism.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush