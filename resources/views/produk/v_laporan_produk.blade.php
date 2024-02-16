@extends('part-front-end-2/template')
@section('judul_halaman','LAPORAN PRODUK')

@section('konten')
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

<?php $id_penjual = Auth::user()->id; ?>
<a href="/produk/print/{{$id_penjual}}" target="_blank" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-print"></i>
    </span>
    <span class="text">Print</span>
</a>
<p></p>

<div class="table-responsive">
    <!-- Tabel produk -->
    <table id="tabel" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Terjual</th>
            <th>Penghasilan</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($produk as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->kode_produk}}</td>
                    <td>{{$data->nama_produk}}</td>
                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->terjual}}</td>
                    <td>{{$data->penghasilan}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7"><strong style="float: right">Penghasilan Yang Didapatkan</strong></td>
                <td>{{$TotalPenghasilan}}</td>
            </tr>
        </tbody>
    </table><br/>
    <!-- End -->
</div>
@endsection
