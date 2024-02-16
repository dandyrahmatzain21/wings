@extends('part-front-end-1.template')
@section('judul_halaman', 'Keranjang Belanja')
@section('title', 'UMKM Cirebon')
@section('konten')
    @include('part-front-end-1.banner')
    <div style="padding-left: 25%;padding-right:25%">
        <?php
        $id_random = '0123456789';
        $id_random2 = '0123456789';
        ?>

        <?php $kode_pembayaran = substr(str_shuffle($id_random2), 0, 12); ?>
        <form method="POST" action="/pembayaran/keranjang/update" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror"
                    id="id_pesanan" placeholder="Id Kategori" value="{{ $keranjang->id_pesanan }}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="kode_pembayaran"
                    class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran"
                    placeholder="Id Pesanan" value="{{ $kode_pembayaran }}" readonly>
                <div class="invalid-feedback">
                    @error('kode_pembayaran')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="customer_name">Nama Customer</label>
                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror"
                    id="customer_name" placeholder="Id Kategori" value="{{ Auth::user()->name }}">
                <div class="invalid-feedback">
                    @error('customer_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="customer_phone">Telepon Customer</label>
                <input type="text" name="customer_phone"
                    class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone"
                    placeholder="Id Kategori" value="{{ Auth::user()->customer_phone }}">
                <div class="invalid-feedback">
                    @error('customer_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="customer_address">Alamat Customer</label>
                <textarea type="text" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror"
                    id="customer_address" placeholder="Id Kategori">{{ Auth::user()->customer_address }}</textarea>
                <div class="invalid-feedback">
                    @error('customer_address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror"
                    id="status" placeholder="Id Kategori" value="1" readonly>
                <div class="invalid-feedback">
                    @error('status')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <label for="metode_pembayaran">Metode Pembayaran</label>
            <div class="form-group">
                <select name="metode_pembayaran" id="metode_pembayaran"
                    class="form-control @error('metode_pembayaran') is-invalid @enderror" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="1">Admin</option>
                    <option value="6">BRIVA</option>
                    <option value="7">BCA Virtual Account</option>
                </select>
                <div class="invalid-feedback">
                    @error('metode_pembayaran')
                        {{ $message }}
                    @enderror
                </div>
            </div><br><br>

            <label for="metode_pengiriman">Metode Pengiriman</label>
            <div class="form-group">
                <select name="metode_pengiriman" id="metode_pengiriman"
                    class="form-control @error('metode_pengiriman') is-invalid @enderror" required>
                    <option value="">Pilih Metode Pengiriman</option>
                    <option value="1">J&T</option>
                    <option value="2">JNE</option>
                    <option value="3">POS Indonesia</option>
                </select>
                <div class="invalid-feedback">
                    @error('metode_pengiriman')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->



            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->

            @foreach ($keranjang2 as $data)
                <div class="product_image_area">
                    <div class="container">
                        <div class="row s_product_inner">
                            <div class="col-lg-6">
                                <div class="s_Product">
                                    <div class="single-prd-item">
                                        <img width="100%" class="img-fluid" src="{{ url('gambar/' . $data->gambar) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <div class="s_product_text">
                                    <h3>{{ $data->nama_produk }}</h3>
                                    <h2>Rp.{{ $data->harga }}</h2>
                                    <ul class="list">
                                        <li><a class="" href="#"><span>Kategori</span> :
                                                {{ $data->nama_kategori }}</a></li>
                                        <li><a href="#"><span>Stok</span> : {{ $data->stok }}</a></li>
                                    </ul>
                                    <p>{{ $data->deskripsi }}</p>
                                    <div class="form-group">
                                        <input type="hidden" name="id_pembayaran[]"
                                            class="form-control @error('id_pembayaran') is-invalid @enderror"
                                            id="id_pembayaran" placeholder="Id Pembayaran" value="<?php echo substr(str_shuffle($id_random), 0, 6); ?>"
                                            readonly>
                                        <div class="invalid-feedback">
                                            @error('id_pembayaran')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="id_produk[]"
                                            class="form-control @error('id_produk') is-invalid @enderror" id="id_produk"
                                            placeholder="Id Produk" value="{{ $data->id_produk }}" readonly>
                                        <div class="invalid-feedback">
                                            @error('id_produk')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="id_pesanan_detail[]"
                                            class="form-control @error('id_pesanan_detail') is-invalid @enderror"
                                            id="id_pesanan_detail" placeholder="Id Kategori"
                                            value="{{ $data->id_pesanan_detail }}" readonly>
                                        <div class="invalid-feedback">
                                            @error('id_pesanan_detail')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="id_pesanan2[]"
                                            class="form-control @error('id_pesanan2') is-invalid @enderror"
                                            id="id_pesanan2" placeholder="Id Kategori" value="{{ $data->id_pesanan }}"
                                            readonly>
                                        <div class="invalid-feedback">
                                            @error('id_pesanan2')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nama[]"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            placeholder="Id Kategori" value="{{ Auth::user()->name }}" hidden>
                                        <div class="invalid-feedback">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="jumlah[]"
                                            class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                            placeholder="Id Pembayaran" value="{{ $data->jumlah }}" readonly>
                                        <div class="invalid-feedback">
                                            @error('jumlah')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="subtotal[]"
                                            class="form-control @error('subtotal') is-invalid @enderror" id="subtotal"
                                            placeholder="Id Pembayaran" value="{{ $data->subtotal }}" readonly>
                                        <div class="invalid-feedback">
                                            @error('subtotal')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="status2[]"
                                            class="form-control @error('status2') is-invalid @enderror" id="status2"
                                            placeholder="Id Kategori" value="1" readonly>
                                        <div class="invalid-feedback">
                                            @error('status2')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group">
                <input type="hidden" name="total_harga" class="form-control @error('total_harga') is-invalid @enderror"
                    id="total_harga" value="{{ $total_harga }}" readonly>
                <div class="invalid-feedback">
                    @error('total_harga')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------------------------------------------------------->

            <!-- Modal -->
            <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Sudah Yakin Untuk Membayar Produk Anda ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                            <button class="btn btn-primary">Bayar</button>
                        </div>
                    </div>
                </div>
            </div><!-- END -->
        </form>
        <?php $id_penjual = auth()->user()->id; ?>
        <div class="modal-footer">
            <a href="/kategori/{{ $id_penjual }}" class="btn btn-danger" class="btn btn-icon btn-danger"
                type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
            <!-- Modal Button -->
            <button data-toggle="modal" data-target="#modal_edit" class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fas fa-wallet"></i></span>
                <span class="btn-inner--text">Bayar</span>
            </button>
            <!-- END -->
        </div>

    </div>
@endsection
