@extends('part-front-end-2/template')
@section('judul_halaman','EDIT PENJUAL')
@section('title','UMKM Cirebon')

@section('konten')
    <form method="POST" action="/penjual/update/{{$penjual->id_penjual}}" enctype="multipart/form-data">
        @csrf
        <!-- Field id penjual -->
        <div class="form-group">
            <label for="id_penjual">id penjual</label>
            <input type="text" name="id_penjual" class="form-control @error('id_penjual') is-invalid @enderror" id="id_penjual" placeholder="id penjual" value="{{$penjual->id_penjual}}" readonly>
            <div class="invalid-feedback">
            @error('id_penjual')
                {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama penjual -->
        <div class="form-group">
            <label for="nama_penjual">Nama penjual</label>
            <input type="text" name="nama_penjual" class="form-control @error('nama_penjual') is-invalid @enderror" id="nama_penjual" placeholder="Nama penjual" value="{{$penjual->nama_penjual}}">
            <div class="invalid-feedback">
                @error('nama_penjual')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{$penjual->alamat}}">
            <div class="invalid-feedback">
                @error('alamat')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Telpon -->
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Telepon" value="{{$penjual->telepon}}">
            <div class="invalid-feedback">
                @error('telepon')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Modal -->
        <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Edit Sudah Benar, Yakin Untuk Megubah Data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer">
        <a href="/penjual" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <!-- Modal Button -->
        <button data-toggle="modal" data-target="#modal_edit" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
