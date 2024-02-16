@extends('part-front-end-2/template')
@section('judul_halaman','EDIT KATEGORI')
@section('title','UMKM Cirebon')

@section('konten')
    <form method="POST" action="/kategori/update/{{$kategori->id_kategori}}" enctype="multipart/form-data">
    @csrf
        <!-- Field Nama Kategori -->
        <div class="form-group">
            <input type="hidden" name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" placeholder="Id Kategori" value="{{$kategori->id_kategori}}" readonly>
            <div class="invalid-feedback">
                @error('id_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Field Nama Kategori -->
        <div class="form-group">
            <label for="nama_kategori">Nama</label>
            <input type="text" name="nama_kategori" class="form-control @error('nama') is-invalid @enderror" id="nama_kategori" placeholder="Nama" value="{{$kategori->nama_kategori}}">
            <div class="invalid-feedback">
                @error('nama_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- END -->

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
                        <button class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Tidak</span>
                        </button>
                        <!--<button class="btn btn-primary">Ya</button>-->
                        <button class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->
    </form>
        <?php $id_penjual = auth()->user()->id ?>
        <div class="modal-footer">
            <a href="/kategori/{{$id_penjual}}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <!-- Modal Button -->
            <button data-toggle="modal" data-target="#modal_edit" class="btn btn-primary btn-icon-split" type="button">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
            <!-- END -->
        </div>
@endsection
