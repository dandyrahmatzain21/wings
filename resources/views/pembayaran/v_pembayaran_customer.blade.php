@extends('part-front-end-2/template')
@section('judul_halaman','DATA PEMBAYARAN CUSTOMER')
@section('title','UMKM Cirebon')

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
    <a href="/pesanan/print" target="_blank" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-print"></i>
        </span>
        <span class="text">Print</span>
    </a>
    <p></p>
    <!-- Tabel pesanan -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pembayaran</th>
                    <th>Kode Pembayaran</th>
                    <th>Id Pesanan</th>
                    <th>Nama Customer</th>
                    <th>Produk Yang Di Beli</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1;?>
                @foreach ($pembayaran as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_pembayaran}}</td>
                    <td>{{$data->kode_pembayaran}}</td>
                    <td>{{$data->id_pesanan}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->nama_produk}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>Rp.{{$data->subtotal}}</td>
                    <td>{{$data->metode_pembayaran}}</td>
                    <td>
                        @if ($data->status == 1)
                        Belum Bayar
                        @elseif ($data->status == 2)
                        Sudah Bayar
                        @else
                        Menunggu Verifikasi
                        @endif
                    </td>
                    <td>
                        @if ($data->status == 1)

                        @elseif ($data->status == 2)
                        <a href="/pesanan/invoice/{{$data->id_pesanan}}" target="_blank" class="genric-btn success">Invoice</a>
                        @else
                        Menunggu Verifikasi
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->
@endsection
