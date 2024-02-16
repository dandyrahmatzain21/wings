@extends('part-front-end-1.template')
@section('judul_halaman','Data Pembayaran Customer')
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
        <!-- Tabel pesanan -->
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pembayaran</th>
                        <th>Id Pesanan</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @foreach ($pembayaran as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->kode_pembayaran}}</td>
                            <td>{{$data->id_pesanan}}</td>
                            <td>{{$data->nama_produk}}</td>
                            <td>{{$data->tanggal_bayar}}</td>
                            <td>{{$data->jumlah}}</td>
                            <td>{{$data->subtotal}}</td>
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
                                <button type="button" class="genric-btn primary" data-toggle="modal" data-target="#infobayar{{$data->id_pesanan}}">
                                    <i class="fas fa-dollar"></i> Bayar
                                </button>
                                @elseif ($data->status == 2)
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" target="_blank" class="genric-btn success"><i class="fas fa-info-circle"></i> Invoice</a>
                                @else
                                Menunggu Verifikasi
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br/>
        </div>
        <!-- Tabel End -->
    </div>

    @foreach ($pembayaran as $data)
    <!-- Modal -->
    <div class="modal fade" id="infobayar{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kode Pembayaran Anda <strong>{{$data->kode_pembayaran}}</strong> <br> Silahkan Hubungi Administrasi Untuk Melakukan Pembayaran, Jika Anda Menggunakan Metode Pembayaran Alfamart / Indomart Kunjungi Alfamart / Indomart Terdekat Dan Tunjukan Kode Pembayaran Kepada Kasir.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="genric-btn primary" data-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
