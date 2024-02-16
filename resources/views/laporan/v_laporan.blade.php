@extends('part-front-end-2/template')
@section('judul_halaman','LAPORAN')

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

@if (Auth()->user()->level == 1)
<div class="row">
    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/primary.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Produk</h1>
                    </div>
                </div>
            </div>
        </div>
        <a href="/print/semuaproduk/" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</a>
    </div>
    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/danger.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Pesanan</h1>
                    </div>
                </div>
            </div>
        </div>
        <a href="/print/pesanan" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</a>
    </div>

    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <button type="button" data-toggle="modal" data-target="#laporan_pembayaran" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</button>

        <!-- Modal -->
        <div class="modal fade" id="laporan_pembayaran" tabindex="-1" role="dialog" aria-labelledby="laporan_pembayaranLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="laporan_pembayaranLabel">Laporan Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Laporan Berdasarkan Tanggal</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_awal_pembayaran">Tanggal Awal</label>
                                    <input type="date" name="tgl_awal_pembayaran" class="form-control @error('tgl_awal_pembayaran') is-invalid @enderror" id="tgl_awal_pembayaran" value="{{old('tgl_awal_pembayaran')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_akhir_pembayaran">Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir_pembayaran" class="form-control @error('tgl_akhir_pembayaran') is-invalid @enderror" id="tgl_akhir_pembayaran" value="{{old('tgl_akhir_pembayaran')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/print/pembayaran" target="_blank" class="btn btn-default">Print Semua Data</a>
                        <a href="" onclick="this.href='/print/pembayaran_per_tgl/'+ document.getElementById('tgl_awal_pembayaran').value + '/' + document.getElementById('tgl_akhir_pembayaran').value "
                        target="_blank" class="btn btn-info">
                            Print
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/info.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Penjual</h1>
                    </div>
                </div>
            </div>
        </div>
        <a href="/penjual/print" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</a>
    </div>
</div>
@elseif (Auth()->user()->level == 4)
<?php $id_alfamart = Auth()->user()->id ?>
<div class="row">
    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <button type="button" data-toggle="modal" data-target="#laporan_pembayaran" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</button>

        <!-- Modal -->
        <div class="modal fade" id="laporan_pembayaran" tabindex="-1" role="dialog" aria-labelledby="laporan_pembayaranLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="laporan_pembayaranLabel">Laporan Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Laporan Berdasarkan Tanggal</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_awal_pembayaran">Tanggal Awal</label>
                                    <input type="date" name="tgl_awal_pembayaran" class="form-control @error('tgl_awal_pembayaran') is-invalid @enderror" id="tgl_awal_pembayaran" placeholder="Tanggal Awal" value="{{old('tgl_awal_pembayaran')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_akhir_pembayaran">Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir_pembayaran" class="form-control @error('tgl_akhir_pembayaran') is-invalid @enderror" id="tgl_akhir_pembayaran" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_pembayaran')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/print/pembayaran_alfamart/{{$id_alfamart}}" target="_blank" class="btn btn-default">Print Semua Data</a>
                        <a href="" onclick="this.href='/print/pembayaran_alfamart_per_tgl/{{$id_alfamart}}/'+ document.getElementById('tgl_awal_pembayaran').value + '/' + document.getElementById('tgl_akhir_pembayaran').value " target="_blank" class="btn btn-info">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (Auth()->user()->level == 5)
<?php $id_indomart = Auth()->user()->id ?>
<div class="row">
    <div class="col-4">
        <div class="card card-profile">
            <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div style="margin-top:-30%;">
                    <div class="card-profile-image">
                        <h1 style="color: white">Laporan Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <button type="button" data-toggle="modal" data-target="#laporan_pembayaran" class="btn btn-primary btn-block"><i class="fa fa-print"></i>
            Print Laporan</button>

        <!-- Modal -->
        <div class="modal fade" id="laporan_pembayaran" tabindex="-1" role="dialog" aria-labelledby="laporan_pembayaranLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="laporan_pembayaranLabel">Laporan Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Laporan Berdasarkan Tanggal</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_awal_pembayaran">Tanggal Awal</label>
                                    <input type="date" name="tgl_awal_pembayaran" class="form-control @error('tgl_awal_pembayaran') is-invalid @enderror" id="tgl_awal_pembayaran" placeholder="Tanggal Awal" value="{{old('tgl_awal_pembayaran')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_akhir_pembayaran">Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir_pembayaran" class="form-control @error('tgl_akhir_pembayaran') is-invalid @enderror" id="tgl_akhir_pembayaran" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_pembayaran')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/print/pembayaran_indomart/{{$id_indomart}}" target="_blank" class="btn btn-default">Print Semua Data</a>
                        <a href="" onclick="this.href='/print/pembayaran_indomart_per_tgl/{{$id_indomart}}/'+ document.getElementById('tgl_awal_pembayaran').value + '/' + document.getElementById('tgl_akhir_pembayaran').value " target="_blank" class="btn btn-info">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
