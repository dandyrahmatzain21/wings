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

    <div class="table-responsive">
        <!-- Tabel produk -->
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Id Kategori</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
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
                        <td>{{$data->id_kategori}}</td>
                        <td>{{$data->deskripsi}}</td>
                        <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
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
                            <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#verifikasi{{$data->id_produk}}">
                                <i class="fas fa-check-circle"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
        <!-- End -->
    </div>@foreach ($produk as $data)
    <!-- Modal -->
    <div class="modal fade" id="verifikasi{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Untuk Memverifikasi Produk Ini ?</p>
                    <form method="POST" action="/produk/verifikasi/{{$data->id_produk}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Field Kode produk -->
                        <div class="form-group">
                            <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id Produk" value="{{$data->id_produk}}" readonly>
                            <div class="invalid-feedback">
                                @error('id_produk')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Kode produk -->
                        <div class="form-group">
                            <input type="hidden" name="kode_produk" class="form-control @error('kode_produk') is-invalid @enderror" id="kode_produk" placeholder="Kode Produk" value="{{$data->kode_produk}}" readonly>
                            <div class="invalid-feedback">
                                @error('kode_produk')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Kode produk -->
                        <div class="form-group">
                            <input type="hidden" name="id_penjual" class="form-control @error('id_penjual') is-invalid @enderror" id="id_penjual" placeholder="Id Penjual" value="{{$data->id_penjual}}" readonly>
                            <div class="invalid-feedback">
                                @error('id_penjual')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Nama produk -->
                        <div class="form-group">
                            <input type="hidden" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" placeholder="Nama produk" value="{{$data->nama_produk}}">
                            <div class="invalid-feedback">
                                @error('nama_produk')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field id kategori -->
                        <div class="form-group">
                            <input type="hidden" name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" placeholder="id_kategori" value="{{$data->id_kategori}}">
                            <div class="invalid-feedback">
                                @error('id_kategori')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field deskripsi -->
                        <div class="form-group">
                            <input type="hidden" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" value="{{$data->deskripsi}}">
                            <div class="invalid-feedback">
                                @error('deskripsi')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Harga -->
                        <div class="form-group">
                            <input type="hidden" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="stok" value="{{$data->stok}}">
                            <div class="invalid-feedback">
                                @error('stok')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field Harga -->
                        <div class="form-group">
                            <input type="hidden" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" value="{{$data->harga}}">
                            <div class="invalid-feedback">
                                @error('harga')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field berat -->
                        <div class="form-group">
                            <input type="hidden" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Berat" value="{{$data->berat}}">
                            <div class="invalid-feedback">
                                @error('berat')
                                    {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <!-- Field End -->

                        <!-- Field status -->
                        <div class="form-group">
                            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Status" value="2">
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
                            <button class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Verifikasi</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
