<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Dandy Rahmat Zain | 2019102060">
    <title>Laporan Kategori {{date('D-M-Y')}}</title>
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
                            <h1 style="color: white">Date : {{date('D-M-Y')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Isi Laporan -->
        <div class="container-fluid mt--9">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h1 style="text-align: center" class="mb-0">LAPORAN KATEGORI</h1>
                        </div>
                        <div class="card-body">
                            <div class="icon-example">
                                <table class="table table table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Id Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($kategori as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$data->id_kategori}}</td>
                                                <td>{{$data->nama_kategori}}</td>
                                                <td>{{$data->slug}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->
    </div>
@include('part/javascript_link')
</body>
</html>
