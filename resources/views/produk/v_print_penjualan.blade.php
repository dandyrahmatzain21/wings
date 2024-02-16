<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Wings Store</title>
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
                            <h1 style="text-align: center" class="mb-0">LAPORAN PENJUALAN</h1>
                        </div>
                        <div class="card-body">
                            <div class="icon-example">
                                <!-- Tabel Laporan -->
                                <div class="table">
                                    <table class="table table-bordered table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
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
                                                    <td>{{$data->nama_produk}}</td>
                                                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                                                    <td>{{$data->stok}}</td>
                                                    <td>{{$data->harga}}</td>
                                                    <td>{{$data->jumlah}}</td>
                                                    <td>{{$data->subtotal}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="7"><strong style="float: right">Penghasilan Yang Didapatkan</strong></td>
                                                <td>{{$total_harga}}</td>
                                            </tr>
                                        </tbody>
                                    </table><br/>
                                </div>
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
