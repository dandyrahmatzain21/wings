@extends('part-front-end-2/template')
@section('judul_halaman','DATA PENJUAL')
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

    <a href="/penjual/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    <a href="/penjual/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
    <p></p>
    <!-- Tabel penjual -->
    <div class="table-responsive">
        <table id="tabel" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Id Penjual</th>
                <th>Nama Penjual</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($penjual as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_penjual}}</td>
                        <td>{{$data->nama_penjual}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->telepon}}</td>
                        <td>
                            <a href="/penjual/detail/{{$data->id_penjual}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                            <a href="/penjual/edit/{{$data->id_penjual}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_penjual}}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

    @foreach ($penjual as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_penjual}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Data Penjual {{$data->nama_penjual}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    <a href="/penjual/delete/{{$data->id_penjual}}" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
