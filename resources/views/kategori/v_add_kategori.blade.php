@extends('part-front-end-2/template')
@section('judul_halaman','TAMBAH DATA KATEGORI')
@section('title','UMKM Cirebon')

@section('konten')
    <form method="POST" action="/kategori/insert" enctype="multipart/form-data">
        @csrf

        <!-- Field Nama Kategori -->
        <?php
        $id_random = '0123456789';
        ?>
        <div class="form-group">
            <input type="hidden" name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" placeholder="Id Kategori" value="<?php echo substr(str_shuffle($id_random), 0, 6);?>" readonly>
            <div class="invalid-feedback">
                @error('id_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- END -->

        <!-- Field Deskripsi Kategori -->
        <div class="form-group">
            <label for="nama_kategori">Nama</label>
            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" placeholder="Nama Kategori" value="{{old('nama_kategori')}}">
            <div class="invalid-feedback">
                @error('nama_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- END -->

        <!-- Modal -->
        <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Menambah Data ?</p>
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
    <div class="modal-footer">
        <a href="/kategori" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-primary btn-icon-split" type="button">
            <span class="icon text-white-50">
                <i class="fas fa-save"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
    </div>
@endsection
