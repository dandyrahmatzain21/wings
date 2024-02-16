@extends('part-front-end-1/template')
@section('judul_halaman','Masukan Ke Keranjang')
@section('title','UMKM Cirebon')

@section('konten')
@include('part-front-end-1.banner')
<?php
$id_random = '0123456789';
$id_random2 = '0123456789';
$id_pesanan = substr(str_shuffle($id_random), 0, 6);
$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
?>
<?php $kode_pembayaran = substr(str_shuffle($id_random2), 0, 12);?>

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product">
                    <div class="single-prd-item">
                        <img width="100%" class="img-fluid" src="{{url('gambar/'.$produk->gambar)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$produk->nama_produk}}</h3>
                    <h2>Rp.{{$produk->harga}}</h2>
                    <ul class="list">
                        <li><a class="" href="#"><span>Kategori</span> : {{$produk->nama_kategori}}</a></li>
                        <li><a href="#"><span>Stok</span> : {{$produk->stok}}</a></li>
                    </ul>
                    <p>{{$produk->deskripsi}}</p><form method="POST" action="/keranjang/insert" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id_pesanan_detail" class="form-control @error('id_pesanan_detail') is-invalid @enderror" id="id_pesanan_detail" placeholder="Id produk" value="{{Auth::user()->id;}}" readonly>
                            <div class="invalid-feedback">
                                @error('id_pesanan_detail')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id produk" value="{{$id_pesanan}}" readonly>
                            <div class="invalid-feedback">
                                @error('id_pesanan')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id produk" value="{{$produk->id_produk}}" readonly>
                            <div class="invalid-feedback">
                                @error('id_produk')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Id produk" value="{{$produk->harga}}" readonly>
                            <div class="invalid-feedback">
                                @error('harga')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Jumlah" value="{{$produk->stok}}" >
                            <div class="invalid-feedback">
                                @error('stok')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}" >
                            <div class="invalid-feedback">
                                @error('jumlah')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Id produk" value="{{$produk->berat}}" readonly>
                            <div class="invalid-feedback">
                                @error('berat')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

                        <div class="form-group">
                            <input type="hidden" name="invoice" class="form-control @error('invoice') is-invalid @enderror" id="invoice" placeholder="Id produk" value="<?php echo substr(str_shuffle($permitted_chars), 0, 6);?>" readonly>
                            <div class="invalid-feedback">
                                @error('invoice')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" placeholder="Id produk" value="{{Auth::user()->name;}}" >
                            <div class="invalid-feedback">
                                @error('customer_name')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" placeholder="Id produk" value="{{Auth::user()->customer_phone;}}"   >
                            <div class="invalid-feedback">
                                @error('customer_phone')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" placeholder="Id produk" value="{{Auth::user()->customer_address;}}"   >
                            <div class="invalid-feedback">
                                @error('customer_address')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subtotal">Subtotal</label>
                            <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Subtotal" value="{{old('subtotal')}}" readonly>
                            <div class="invalid-feedback">
                                @error('subtotal')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Id produk" value="0" readonly>
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Ke Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Yakin Untuk Menambah Barang Ini Ke Cart ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                        <button class="btn btn-primary">Ya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="/home" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
        <span class="btn-inner--text">Kembali</span>
    </a>
    <!-- Button Modal -->
    <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
        <span class="btn-inner--icon"><i class="lnr lnr-cart"></i></span>
        <span class="btn-inner--text">Tambahkan Ke Cart</span>
    </button>
    <!-- END -->
</div>

@endsection
