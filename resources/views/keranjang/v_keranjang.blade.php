@extends('part-front-end-1.template')
@section('judul_halaman','Keranjang Belanja')
@section('title','UMKM Cirebon')
@section('konten')
@include('part-front-end-1.banner')
<div class="container">
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-sm-5">
            @if(session('Pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{session('Pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Pesan Setelah Redirect -->
    </div>
    <div class="table-responsive">
        <!-- Tabel produk -->
        <table class="table table-bordered table table-striped">
            <thead>
                <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th colspan="2">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($keranjang as $data)<tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                    <td>{{$data->nama_produk}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->subtotal}}</td>
                    <td><a href="/keranjang/delete/{{$data->id_pesanan}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6"><strong style="float: right">Total Harga Yang Harus Di Bayar</strong></td>
                    <td>{{$total_harga}}</td>
                </tr>
                <td colspan="7"><a style="float: right" href="/pembayaran/keranjang/{{$data->id_pesanan_detail}}" class="btn btn-primary"><i class="fas fa-cash"></i>Bayar</a></td>
            </tbody>
        </table><br/>
        <!-- End -->
    </div>
</div>
@endsection
