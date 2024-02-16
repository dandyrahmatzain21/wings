@extends('part-front-end-1.template')
@section('judul_halaman', 'Produk Kami')
@section('title', 'UMKM Cirebon')
@section('konten')
    <!-- start banner Area -->
    @include('part-front-end-1/banner_area')
    <!-- End banner Area -->

    <!-- start features Area -->
    @include('part-front-end-1/card')
    <!-- end features Area -->

    <!-- Start category Area -->
    @include('part-front-end-1/category')

    <!-- End category Area
            <div class="row">
                <div class="col-sm"></div>
                <div class="input-group mb-3 col-sm-3">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <a  onclick="this.href='/search/produk/'+ document.getElementById('search').value" class="btn btn-outline-primary" type="button" id="button-addon2">Cari</a>
                    </div>
                  </div>
            </div>-->

    <section class="owl-carousel section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                            <p>Produk Kami Mengutamakan Kualitas Dan Ke Originalan.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    @forelse ($produk as $data)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ url('gambar/' . $data->gambar) }}" alt="">
                                <div class="product-details">
                                    <h6>{{ $data->nama_produk }}</h6>
                                    <div class="price">
                                        <h6>Rp.{{ $data->harga }}</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="/keranjang/add/{{ $data->id_produk }}" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">add to cart</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-user"></span>
                                            <p class="hover-text">{{ $data->nama_produk }}</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-layers "></span>
                                            <p class="hover-text">{{ $data->nama_kategori }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Data Masih Kosong</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
