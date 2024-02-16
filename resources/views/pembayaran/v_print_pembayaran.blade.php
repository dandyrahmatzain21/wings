<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Laporan Pembayaran {{date('d-m-Y')}}</title>
    @include('part/css_link')
</head>

<body onload="window.print();">
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </div>
        </nav>
        <div class="header bg-primary pb-9">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h1 class="h1 text-white d-inline-block mb-0">Wings Store</h1>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <h1 style="color: white">Tanggal : {{date('d-m-Y')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt--9">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h1 style="text-align: center" class="mb-0">LAPORAN PEMBAYARAN</h1>
                        </div>
                        <div class="card-body">
                            <div class="icon-example">
                                <!-- Tabel Laporan -->
                                <table class="table table-bordered table table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Id Pesanan</th>
                                        <th>Nama</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Metode Pengiriman</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($pembayaran as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$data->kode_pembayaran}}</td>
                                                <td>{{$data->id_pesanan}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->tanggal_bayar}}</td>
                                                <td>
                                                    @if ($data->metode_pengiriman == 1)
                                                    JNE
                                                    @elseif ($data->metode_pengiriman == 2)
                                                    J&T
                                                    @elseif ($data->metode_pengiriman == 3)
                                                    Pos Indonesia
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->metode_pembayaran == 0)
                                                    E-Moneyku
                                                    @elseif ($data->metode_pembayaran == 1)
                                                    Admin UMKM
                                                    @elseif ($data->metode_pembayaran == 4)
                                                    Alfamart
                                                    @elseif ($data->metode_pembayaran == 5)
                                                    Indomart
                                                    @elseif ($data->metode_pembayaran == 6)
                                                    BRIVA
                                                    @elseif ($data->metode_pembayaran == 7)
                                                    BCA Virtual Account
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->status == 1)
                                                    Belum Bayar
                                                    @elseif ($data->status == 2)
                                                    Sudah Bayar
                                                    @else
                                                    Menunggu Verifikasi
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('part/javascript_link')
</body>
</html>
