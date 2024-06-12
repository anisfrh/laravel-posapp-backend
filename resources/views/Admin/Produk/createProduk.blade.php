@extends('layouts.base')

@section('title', 'Form Produk')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Input Produk</h1>
        </div>
        <div class="card">
            <form action="{{route('dataProduk.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Input Data Produk</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="price" id="price" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="stock" id="stock" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image Produk</label>
                        <input type="file" name="image" id="image" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori Produk</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="category" value="food" required class="selectgroup-input" checked="">
                                <span class="selectgroup-button">Makanan</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="category" value="drink" required class="selectgroup-input">
                                <span class="selectgroup-button">Minuman</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="category" value="snack" required class="selectgroup-input">
                                <span class="selectgroup-button">Snack</span>
                            </label>

                        </div>
                    </div>
                    <div class="form-group">
                       <label style="font-size: 14px;">Deskripsi Produk</label>
                        <div class="">
                            <textarea class="summernote" name="deskripsi" required></textarea>
                        </div>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
               
            </form>
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
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush