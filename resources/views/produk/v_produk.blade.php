@extends('part-front-end-2/template')
@section('judul_halaman','DATA PRODUK')
@section('title','UMKM Cirebon')

@section('konten')
@if (optional(auth()->user())->level==3)
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

    <a href="/add/produk" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>

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
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
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
                        <td>{{$data->berat}}</td>
                        @if ($data->status == "1")
                            <td>Belum Diverifikasi</td>
                        @elseif ($data->status == "2")
                            <td>Aktif</td>
                        @else
                            <td>Menunggu Verifikasi</td>
                        @endif
                        <td>
                            @if ($data->status == "1")
                            <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#infoverifikasi{{$data->id_produk}}">
                                <i class="fas fa-info-circle"></i>
                            </button>
                            @else
                            <a href="/produk/detail/{{$data->id_produk}}" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></a>
                            <a href="/produk/edit/{{$data->id_produk}}" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                            @endif
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete{{$data->id_produk}}">
                            <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
        <!-- End -->
    </div>

@elseif(optional(auth()->user())->level==1)
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Produk</th>
                    <th>Nama Produk</th>
                    <th>Slug</th>
                    <th>Id Kategori</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php $no=1;?>
            <tbody>

                @foreach ($allProduk as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_produk}}</td>
                    <td>{{$data->nama_produk}}</td>
                    <td>{{$data->slug}}</td>
                    <td>{{$data->id_kategori}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->berat}}</td>
                    @if ($data->status == "1")
                        <td>Belum Diverifikasi</td>
                    @elseif ($data->status == "2")
                        <td>Aktif</td>
                    @else
                        <td>Menunggu Verifikasi</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif


    @foreach ($produk as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Data produk {{$data->nama_produk}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Tidak</span>
                    </button>
                    <a href="/produk/delete/{{$data->id_produk}}" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Ya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($produk as $data)
        <!-- Modal -->
        <div class="modal fade" id="infoverifikasi{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Admin Akan Memverifikasi Produk Anda Untuk Di Posting Di Halaman Produk</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Ya</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
