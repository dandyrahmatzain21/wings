@extends('part-front-end-1.template')
@section('judul_halaman', 'Data Pesanan Customer')
@section('title', 'UMKM Cirebon')

@section('konten')
    @include('part-front-end-1.banner')
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-sm-5">
            @if (session('Pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{ session('Pesan') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Pesan Setelah Redirect -->
    </div>
    <div class="container">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pembayaran</th>
                        <th>Subtotal</th>
                        <th>Tanggal Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pesanan as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->kode_pembayaran }}</td>
                            <td>{{ $data->subtotal }}</td>

                            <td>{{ $data->tanggal_pesan }}</td>
                            @if ($data->status == '1')
                                <td>Belum Bayar</td>
                            @elseif ($data->status == '2')
                                <td>Sudah Bayar</td>
                            @elseif ($data->status == '3')
                                <td>Pesanan Sudah Dikirim</td>
                            @elseif ($data->status == '4')
                                <td>Transaksi Selesai</td>
                            @elseif ($data->status == '5' || $data->status == '6')
                                <td>Transaksi Dibatalkan</td>
                            @endif
                            <td>
                                @if ($data->status == '1')
                                    <!--<a href="/pesanan/pembayaran/{{ $data->id_pesanan }}" class="genric-btn primary"><i class="fas fa-dollar"></i>> Bayar</a>-->
                                    <button type="button" class="genric-btn primary" data-toggle="modal"
                                        data-target="#infobayar{{ $data->id_pesanan }}">
                                        <i class="fas fa-dollar"></i> Bayar
                                    </button>
                                    <button type="button" class="genric-btn info" data-toggle="modal"
                                        data-target="#pesanan_detail{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>
                                    <button type="button" class="genric-btn danger" data-toggle="modal"
                                        data-target="#batalkan_pesanan_sebelum_bayar{{ $data->id_pesanan }}">
                                        <i class="fas fa-ban"></i> Batalkan Pesanan
                                    </button>
                                @elseif ($data->status == '2')
                                    <button type="button" class="genric-btn primary" data-toggle="modal"
                                        data-target="#info_tunggu{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> info
                                    </button>
                                    <button type="button" class="genric-btn info" data-toggle="modal"
                                        data-target="#pesanan_detail{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>
                                    <a href="/pesanan/invoice/{{ $data->id_pesanan }}" target="_blank"
                                        class="genric-btn success"><i class="fas fa-info-circle"></i> Invoice</a>
                                    <button type="button" class="genric-btn danger" data-toggle="modal"
                                        data-target="#batalkan_pesanan{{ $data->id_pesanan }}">
                                        <i class="fas fa-ban"></i> Batalkan Pesanan
                                    </button>
                                @elseif ($data->status == '3')
                                    <button type="button" class="genric-btn info" data-toggle="modal"
                                        data-target="#info{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Info Pengiriman
                                    </button>
                                    <button type="button" class="genric-btn primary" data-toggle="modal"
                                        data-target="#konfirmasi{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Konfirmasi Barang Diterima
                                    </button>
                                    <button type="button" class="genric-btn info" data-toggle="modal"
                                        data-target="#pesanan_detail{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>
                                    <a href="/pesanan/invoice/{{ $data->id_pesanan }}" target="_blank"
                                        class="genric-btn success"><i class="fas fa-info-circle"></i> Invoice</a>
                                @elseif ($data->status == '4')
                                    <button type="button" class="genric-btn info" data-toggle="modal"
                                        data-target="#pesanan_detail{{ $data->id_pesanan }}">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>
                                    <a href="/pesanan/invoice/{{ $data->id_pesanan }}" target="_blank"
                                        class="genric-btn success"><i class="fas fa-info-circle"></i> Invoice</a>
                                @elseif ($data->status == '5' || $data->status == '6')
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br />
        </div>
    </div>

    <!-- Tabel End -->

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="infobayar{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Kode Pembayaran Anda <strong>{{ $data->kode_pembayaran }}</strong> <br>Silahkan hubungi Administrasi Untuk Melakukan Pembayaran Jika Anda Menggunakan
                            Metode Pembayaran Alfamart / Indomart Kunjungi Alfamart / Indomart Terdekat Dan Tunjukan Kode
                            Pembayaran Kepada Kasir.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <div class="modal fade" id="pesanan_detail{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td style="width: 200px">Id Pesanan</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->id_pesanan }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Kode Pembayaran</td>
                                <td style="width: 0px">:</td>
                                <th><strong>{{ $data->kode_pembayaran }}</strong></th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Invoice</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->invoice }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Nama Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_name }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">No Hp Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_phone }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Metode Pembayaran</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->metode_pembayaran }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Metode Pengiriman</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->metode_pengiriman }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Resi Pengiriman</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->no_resi }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Tanggal Pesan</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->tanggal_pesan }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Status</td>
                                <td style="width: 0px">:</td>
                                @if ($data->status == '1')
                                    <th>Belum Bayar</th>
                                @elseif ($data->status == '2')
                                    <th>Sudah Bayar</th>
                                @elseif ($data->status == '3')
                                    <th>Pesanan Sudah Dikirim</th>
                                @elseif ($data->status == '4')
                                    <th>Transaksi Selesai</th>
                                @elseif ($data->status == '5' || $data->status == '6')
                                    <th>Transaksi Dibatalkan</th>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <div class="modal fade" id="batalkan_pesanan{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembatalan Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td style="width: 200px">Id Pesanan</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->id_pesanan }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Nama Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_name }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Alamat Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_address }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Metode Pengiriman</td>
                                <td style="width: 0px">:</td>
                                <th>
                                    @if ($data->metode_pengiriman == 1)
                                        J&T
                                    @elseif ($data->metode_pengiriman == 2)
                                        JNE
                                    @elseif ($data->metode_pengiriman == 3)
                                        Pos Indonesia
                                    @endif
                                </th>
                            </tr>
                        </table>
                        <p>Apakah Anda Yakin Untuk Membatalkan Pesanan ?</p>
                        <form method="POST" action="batalkan_pesanan/{{ $data->id_pesanan }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="status"
                                    class="form-control @error('status') is-invalid @enderror" id="status"
                                    value="5">
                                <div class="invalid-feedback">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-danger">Batalkan Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <div class="modal fade" id="batalkan_pesanan_sebelum_bayar{{ $data->id_pesanan }}" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembatalan Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td style="width: 200px">Id Pesanan</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->id_pesanan }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Nama Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_name }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Alamat Customer</td>
                                <td style="width: 0px">:</td>
                                <th>{{ $data->customer_address }}</th>
                            </tr>
                            <tr>
                                <td style="width: 200px">Metode Pengiriman</td>
                                <td style="width: 0px">:</td>
                                <th>
                                    @if ($data->metode_pengiriman == 1)
                                        J&T
                                    @elseif ($data->metode_pengiriman == 2)
                                        JNE
                                    @elseif ($data->metode_pengiriman == 3)
                                        Pos Indonesia
                                    @endif
                                </th>
                            </tr>
                        </table>
                        <p>Apakah Anda Yakin Untuk Membatalkan Pesanan ?</p>
                        <form method="POST" action="batalkan_pesanan/{{ $data->id_pesanan }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="status"
                                    class="form-control @error('status') is-invalid @enderror" id="status"
                                    value="6">
                                <div class="invalid-feedback">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-danger">Batalkan Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="info{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pesananmu Sudah Dikirim Oleh Penjual Dengan No.Resi <strong>{{ $data->no_resi }}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="info_tunggu{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Pengiriman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Proses Pembayaranmu Sukses,Silahkan Tunggu Pengirim Mengirimkan Pesanan Anda</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="konfirmasi{{ $data->id_pesanan }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Barang Diterima</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Silahkan Konfirmasi Penerimaan Barang Apabila Pesanan Sudah Sampai Dan Diterima. <span
                                style="color: red">*Jangan Konfirmasi Apabila Pesanan Belum Sampai</span></p>

                        <form method="POST" action="konfirmasi_terima_barang/{{ $data->id_pesanan }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="status"
                                    class="form-control @error('status') is-invalid @enderror" id="status"
                                    value="4">
                                <div class="invalid-feedback">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Konfirmasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
