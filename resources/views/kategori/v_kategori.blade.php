@extends('part-front-end-2/template')
@section('judul_halaman','DATA KATEGORI')
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

    <a href="/add/kategori" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>

    <a href="/kategori/print" target="_blank" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-print"></i>
        </span>
        <span class="text">Print</span>
    </a>
    <p></p>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Kategori</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($kategori as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_kategori}}</td>
                        <td>{{$data->nama_kategori}}</td>
                        <td>{{$data->slug}}</td>
                        <td>
                            <a href="/kategori/edit/{{$data->id_kategori}}" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete{{$data->id_kategori}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- END -->

    <!-- Modal -->
    @foreach ($kategori as $data)
        <div class="modal fade" id="delete{{$data->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data kategori Dengan Nama {{$data->nama_kategori}} </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Tidak</span>
                        </button>
                        <a href="/kategori/delete/{{$data->id_kategori}}" class="btn btn-danger btn-icon-split">
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
    <!-- END -->
@endsection
