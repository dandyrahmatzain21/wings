@extends('part-front-end-2/template')
@section('judul_halaman','Pembayaran')
@section('konten')
<form method="POST" action="/pesanan/bayar/{{$pembayaran->id_pembayaran}}" enctype="multipart/form-data">
    @csrf

    <!-- Buat Ke Tabel pembayaran alfamart dan indomart -->
    <div class="form-group">
        <input type="hidden" name="kode_pembayaran" class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran" value="{{$pembayaran->kode_pembayaran}}" readonly>
        <div class="invalid-feedback">
            @error('kode')
                {{ $message}}
            @enderror
        </div>
    </div>

    <label for="id_pembayaran">Id Pembayaran</label>
    <div class="form-group">
        <input type="number" name="id_pembayaran" class="form-control @error('id_pembayaran') is-invalid @enderror" id="id_pembayaran" value="{{$pembayaran->id_pembayaran}}" readonly>
        <div class="invalid-feedback">
            @error('id_pembayaran')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="id_pesanan">Id Pesanan</label>
        <input type="number" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" value="{{$pembayaran->id_pesanan}}" readonly>
        <div class="invalid-feedback">
            @error('id_pesanan')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="nama">Nama Customer</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{$pembayaran->nama}}">
        <div class="invalid-feedback">
            @error('nama')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="customer_phone">No Hp Customer</label>
        <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" value="{{$pembayaran->customer_phone}}" readonly>
        <div class="invalid-feedback">
            @error('customer_phone')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="customer_address">Alamat Customer / Alamat Pengiriman</label>
        <input type="text" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" value="{{$pembayaran->customer_address}}" readonly>
        <div class="invalid-feedback">
            @error('customer_address')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="metode_pembayaran">Metode Pembayaran</label>
        <input type="text" name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" value="{{$pembayaran->metode_pembayaran}}" readonly>
        <div class="invalid-feedback">
            @error('metode_pembayaran')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" value="{{$pembayaran->id_produk}}" readonly>
        <div class="invalid-feedback">
            @error('id_produk')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" value="{{$pembayaran->nama_produk}}" readonly>
        <div class="invalid-feedback">
            @error('nama_produk')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{$pembayaran->jumlah}}" readonly>
        <div class="invalid-feedback">
            @error('jumlah')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="subtotal">Subtotal</label>
        <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" value="{{$pembayaran->subtotal}}" readonly>
        <div class="invalid-feedback">
            @error('subtotal')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="tanggal_bayar">Tanggal Bayar</label>
        <input type="date" name="tanggal_bayar" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" >
        <div class="invalid-feedback">
            @error('tanggal_bayar')
                {{ $message}}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="2">
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
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pastikan Customer Sudah Membayar Sebesar <strong>Rp.{{$pembayaran->subtotal}}</strong> Terlebih Dahulu</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-primary">Konfirmasi Bayar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal-footer">
    <?php $id_customer = Auth::user()->id; ?>
    <a href="/pesanan/{{$id_customer}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
        <span class="btn-inner--text">Kembali</span>
    </a>
    <!-- Button Modal -->
    <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
        <span class="btn-inner--icon"><i class="fas fa-wallet"></i></span>
        <span class="btn-inner--text">Bayar</span>
    </button>
    <!-- Button End -->
</div>
@endsection
