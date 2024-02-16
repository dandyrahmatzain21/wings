@extends('part-front-end-2/template')
@section('judul_halaman','DATA LIST VERIFIKASI')
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

    <!-- Tabel pesanan -->
    <div class="table-responsive">
        <table id="tabel" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Id Pembayaran</th>
                <th>Id Pesanan</th>
                <th>Nama</th>
                <th>No Transfer</th>
                <th>Tanggal Transfer</th>
                <th>Proof</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($pembayaran as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_pembayaran}}</td>
                        <td>{{$data->id_pesanan}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->no_transfer}}</td>
                        <td>{{$data->tanggal_transfer}}</td>
                        <td>{{$data->proof}}</td>
                        @if ($data->status == "1")
                        <td>Belum Bayar</td>
                        @elseif ($data->status == "2")
                        <td>Sudah Bayar</td>
                        @elseif ($data->status == "3")
                        <td>Menunggu Verifikasi</td>
                        @endif
                        <td>
                            <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#verifikasi{{$data->id_pesanan}}">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

    @foreach ($pembayaran as $data)
    <!-- Modal -->
    <div class="modal fade" id="verifikasi{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Lakukan Verifikasi Pembayaran Kepada Admin UMKM Cirebon</p>
                    <form method="POST" action="/pembayaran/verifikasi/{{$data->id_pembayaran}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="id_pembayaran" class="form-control @error('id_pembayaran') is-invalid @enderror" id="id_pembayaran" placeholder="Id Pembayaran" value="{{$data->id_pembayaran}}">
                            <div class="invalid-feedback">
                                @error('id_pembayaran')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id Pesanan" value="{{$data->id_pesanan}}">
                            <div class="invalid-feedback">
                                @error('id_pesanan')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{$data->nama}}">
                            <div class="invalid-feedback">
                                @error('nama')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="no_transfer" class="form-control @error('no_transfer') is-invalid @enderror" id="no_transfer" placeholder="no_transfer" value="{{$data->no_transfer}}">
                            <div class="invalid-feedback">
                                @error('no_transfer')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="tanggal_transfer" class="form-control @error('tanggal_transfer') is-invalid @enderror" id="tanggal_transfer" placeholder="tanggal_transfer" value="{{$data->tanggal_transfer}}">
                            <div class="invalid-feedback">
                                @error('tanggal_transfer')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="proof" class="form-control @error('proof') is-invalid @enderror" id="proof" placeholder="proof" value="{{$data->proof}}">
                            <div class="invalid-feedback">
                                @error('proof')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama Penyimpanan -->
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="status" value="2">
                            <div class="invalid-feedback">
                                @error('status')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->
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
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Ya</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
