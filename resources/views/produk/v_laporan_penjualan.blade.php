@extends('part-front-end-2/template')
@section('judul_halaman','DATA PENJUALAN BARANG')
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
    <?php $id_penjual = Auth::user()->id; ?>
    <a href="/penjualan/print/{{$id_penjual}}" target="_blank" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-print"></i>
        </span>
        <span class="text">Print</span>
    </a>
    <p></p>
    <!-- Tabel pesanan -->
    <div class="table-responsive">
        <table id="tabel" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Jumlah Di Beli</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($produk as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->customer_name}}</td>
                        <td>{{$data->kode_produk}}</td>
                        <td>{{$data->nama_produk}}</td>
                        <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                        <td>{{$data->stok}}</td>
                        <td>{{$data->harga}}</td>
                        <td>{{$data->jumlah}}</td>
                        <td>{{$data->subtotal}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="8"><strong style="float: right">Penghasilan Yang Didapatkan</strong></td>
                    <td>{{$total_harga}}</td>
                </tr>
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

    @foreach ($produk as $data)
    <!-- Modal -->
    <div class="modal fade" id="verifikasi{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Lakukan Verifikasi Pembayaran Kepada Admin UMKM Cirebon</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
