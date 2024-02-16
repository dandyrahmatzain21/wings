@extends('part-front-end-2/template')
@section('judul_halaman', 'EDIT PRODUK')
@section('title', 'UMKM Cirebon')

@section('konten')
    <form method="POST" action="/produk/update/{{ $produk->id_produk }}" enctype="multipart/form-data">
        @csrf
        <!-- Field Kode produk -->
        <div class="form-group">
            <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk"
                placeholder="Id Produk" value="{{ $produk->id_produk }}" readonly>
            <div class="invalid-feedback">
                @error('id_produk')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Kode produk -->
        <div class="form-group">
            <input type="hidden" name="id_penjual" class="form-control @error('id_penjual') is-invalid @enderror"
                id="id_penjual" placeholder="Id Penjual" value="{{ $produk->id_penjual }}" readonly>
            <div class="invalid-feedback">
                @error('id_penjual')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama produk -->
        <div class="form-group">
            <label for="nama_produk">Nama produk</label>
            <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                id="nama_produk" placeholder="Nama produk" value="{{ $produk->nama_produk }}">
            <div class="invalid-feedback">
                @error('nama_produk')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Kode produk -->
        <div class="form-group">
            <label for="kode_produk">Kode Produk</label>
            <input type="text" name="kode_produk" class="form-control @error('kode_produk') is-invalid @enderror"
                id="kode_produk" placeholder="Kode produk" maxlength="6" value="{{ $produk->kode_produk }}" readonly>
            <div class="invalid-feedback">
                @error('kode_produk')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field id kategori -->
        <div class="form-group">
            <label for="id_kategori">Id Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror"
                value="{{ old('id_kategori') }}">
                <option value="{{ $produk->id_kategori }}">{{ $produk->id_kategori }} - Dipilih</option>
                @foreach ($kategori as $data)
                    <option value="{{ $data->id_kategori }}">{{ $data->id_kategori }} - {{ $data->nama_kategori }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('id_kategori')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field deskripsi -->
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                id="deskripsi" placeholder="Deskripsi" value="{{ $produk->deskripsi }}">
            <div class="invalid-feedback">
                @error('deskripsi')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Gambar -->
        <div class="form-group">
            <label for="gambar">Gambar</label><span style="color: red"> *Hiraukan Jika Tidak Ingin Diganti</span><br />
            <img src="{{ url('gambar/' . $produk->gambar) }}" width="100px"><br /><br />
            <label for="gambar">Ganti gambar</label><br />
            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                placeholder="Gambar">
            <div class="invalid-feedback">
                @error('gambar')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Harga -->
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok"
                placeholder="Stok" value="{{ $produk->stok }}">
            <div class="invalid-feedback">
                @error('stok')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Harga -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga"
                placeholder="Harga" value="{{ $produk->harga }}">
            <div class="invalid-feedback">
                @error('harga')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field berat -->
        <div class="form-group">
            <label for="berat">Berat</label>
            <input type="number" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat"
                placeholder="Berat" value="{{ $produk->berat }}">
            <div class="invalid-feedback">
                @error('berat')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field status -->
        <div class="form-group">
            <!--<label for="status">Status</label>-->
            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status"
                placeholder="Status" value="{{ $produk->status }}">
            <div class="invalid-feedback">
                @error('status')
                    {{ $message }}
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
    </form>
    <div class="modal-footer">
        <?php $id_penjual = Auth::user()->id; ?>
        <a href="/produk/{{ $id_penjual }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        <!-- Button Modal -->
        <button data-toggle="modal" data-target="#modal_edit" class="btn btn-primary btn-icon-split" type="button">
            <span class="icon text-white-50">
                <i class="fas fa-save"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
        <!-- Button End -->
    </div>
@endsection
