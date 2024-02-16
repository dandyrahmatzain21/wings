@extends('part-front-end-2/template')
@section('judul_halaman','DETAIL PENJUAL')
@section('title','UMKM Cirebon')

@section('konten')
    <!-- Tabel Detail -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Id Penjual</th>
                <th style="width: 30px">:</th>
                <th>{{$penjual->id_penjual}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama penjual</th>
                <th style="width: 30px">:</th>
                <th>{{$penjual->nama_penjual}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Alamat</th>
                <th style="width: 30px">:</th>
                <th>{{$penjual->alamat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Telepon</th>
                <th style="width: 30px">:</th>
                <th>{{$penjual->telepon}}</th>
            </tr>
            <tr>
                <th>
                    <a href="/penjual" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                     </a>
                </th>
            </tr>
        </table>
    </div>
    <!-- Tabel End -->
@endsection
