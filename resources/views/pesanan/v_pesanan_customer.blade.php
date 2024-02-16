@extends('part-front-end-2/template')
@section('judul_halaman','DATA PESANAN CUSTOMER')
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
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pesanan</th>
                    <th>Kode Pembayaran</th>
                    <th>Invoice</th>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Customer Address</th>
                    <th>Subtotal</th>
                    <th>Metode Pembayaran</th>
                    <th>Metode Pengiriman</th>
                    <th>Tanggal Pesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($pesanan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_pesanan}}</td>
                        <td>{{$data->kode_pembayaran}}</td>
                        <td>{{$data->invoice}}</td>
                        <td>{{$data->customer_id}}</td>
                        <td>{{$data->customer_name}}</td>
                        <td>{{$data->customer_phone}}</td>
                        <td>{{$data->customer_address}}</td>
                        <td>{{$data->subtotal}}</td>
                        @if ($data->metode_pembayaran == 1)
                            <td>Admin UMKM</td>
                        @elseif ($data->metode_pembayaran == 4)
                            <td>Alfamart</td>
                        @elseif ($data->metode_pembayaran == 5)
                            <td>Indomart</td>
                        @elseif ($data->metode_pembayaran == 6)
                            <td>BRIVA</td>
                        @elseif ($data->metode_pembayaran == 7)
                            <td>BCA Virtual Account</td>
                        @elseif ($data->metode_pembayaran == 0)
                            <td>E-MoneyKu</td>
                        @endif

                        @if ($data->metode_pengiriman == 1)
                            <td>J&T</td>
                        @elseif ($data->metode_pengiriman == 2)
                            <td>JNE</td>
                        @elseif ($data->metode_pengiriman == 3)
                            <td>Pos Indonesia</td>
                        @endif

                        <td>{{$data->tanggal_pesan}}</td>
                        @if ($data->status == "1")
                            <td>Belum Bayar</td>
                        @elseif ($data->status == "2")
                            <td>Sudah Bayar</td>
                        @elseif ($data->status == "3")
                            <td>Pesanan Sudah Dikirim</td>
                        @elseif ($data->status == "4")
                            <td>Transaksi Selesai</td>
                        @elseif ($data->status == "5" || $data->status == "6")
                            <td>Transaksi Dibatalkan</td>
                        @endif
                        <td>
                            @if ($data->status == "1")
                                <a href="/pesanan/detail/{{$data->id_pesanan}}" class="btn btn-warning btn-circle"><i class="fas fa-info-circle"></i></a>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#batalkan_pesanan_sebelum_bayar{{$data->id_pesanan}}">
                                    <i class="fas fa-ban"></i>
                                </button>
                            @elseif ($data->status == "2")
                                <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#kirim_barang{{$data->id_pesanan}}">
                                    <i class="fas fa-truck"></i>
                                </button>
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" class="btn btn-success btn-circle"><i class="fas fa-receipt"></i></a>
                                <a href="/pesanan/detail/{{$data->id_pesanan}}" class="btn btn-warning btn-circle"><i class="fas fa-info-circle"></i></a>
                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#batalkan_pesanan{{$data->id_pesanan}}">
                                    <i class="fas fa-ban"></i>
                                </button>
                            @elseif ($data->status == "3")
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" class="btn btn-success btn-circle"><i class="fas fa-receipt"></i></a>
                                <a href="/pesanan/detail/{{$data->id_pesanan}}" class="btn btn-warning btn-circle"><i class="fas fa-info-circle"></i></a>
                            @elseif ($data->status == "4")
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" target="_blank" class="btn btn-success btn-circle"><i class="fas fa-receipt"></i></a>
                                <a href="/pesanan/detail/{{$data->id_pesanan}}" class="btn btn-warning btn-circle"><i class="fas fa-info-circle"></i></a>
                            @elseif ($data->status == "5" || $data->status == "6")
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

@foreach ($pesanan as $data)
    <!-- Modal -->
    <div class="modal fade" id="kirim_barang{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tr>
                            <td style="width: 200px">Id Pesanan</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->id_pesanan}}</th>
                        </tr><tr>
                            <td style="width: 200px">Nama Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_name}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Alamat Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_address}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Metode Pengiriman</td>
                            <td style="width: 0px">:</td>
                            <th>@if ($data->metode_pengiriman == 1)J&T @elseif ($data->metode_pengiriman == 2)JNE @elseif ($data->metode_pengiriman == 3)Pos Indonesia @endif</th>
                        </tr>
                    </table>
                    <form method="POST" action="pesanan/kirim_barang/{{$data->id_pesanan}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="no_resi">No Resi</label>
                            <input type="number" name="no_resi" class="form-control @error('no_resi') is-invalid @enderror" id="no_resi">
                            <div class="invalid-feedback">
                                @error('no_resi')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="3">
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <p>Pastikan No Resi Yang Tertera Sudah Sesuai</p>
                        <button class="btn btn-primary">Kirim Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($pesanan as $data)
    <div class="modal fade" id="batalkan_pesanan{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>{{$data->id_pesanan}}</th>
                        </tr><tr>
                            <td style="width: 200px">Nama Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_name}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Alamat Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_address}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Metode Pengiriman</td>
                            <td style="width: 0px">:</td>
                            <th>@if ($data->metode_pengiriman == 1)J&T @elseif ($data->metode_pengiriman == 2)JNE @elseif ($data->metode_pengiriman == 3)Pos Indonesia @endif</th>
                        </tr>
                    </table>
                    <p>Apakah Anda Yakin Untuk Membatalkan Pesanan ?</p>
                    <form method="POST" action="pesanan/batalkan_pesanan/{{$data->id_pesanan}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="5">
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message}}
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
    <div class="modal fade" id="batalkan_pesanan_sebelum_bayar{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>{{$data->id_pesanan}}</th>
                        </tr><tr>
                            <td style="width: 200px">Nama Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_name}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Alamat Customer</td>
                            <td style="width: 0px">:</td>
                            <th>{{$data->customer_address}}</th>
                        </tr>
                        <tr>
                            <td style="width: 200px">Metode Pengiriman</td>
                            <td style="width: 0px">:</td>
                            <th>@if ($data->metode_pengiriman == 1)J&T @elseif ($data->metode_pengiriman == 2)JNE @elseif ($data->metode_pengiriman == 3)Pos Indonesia @endif</th>
                        </tr>
                    </table>
                    <p>Apakah Anda Yakin Untuk Membatalkan Pesanan ?</p>
                    <form method="POST" action="pesanan/batalkan_pesanan/{{$data->id_pesanan}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="6">
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message}}
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
@endsection
