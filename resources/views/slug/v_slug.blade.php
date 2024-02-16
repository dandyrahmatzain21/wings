@extends('part-front-end-1.template')
@section('judul_halaman','Produk Kami')
@section('title','UMKM Cirebon')
@section('konten')
<div style="padding-left: 5%;padding-right:5%;">
    <div class="row">
        <div class="col-sm"></div>
        <div class="input-group mb-3 col-sm-3">
            <input id="search" name="search" type="text" class="form-control" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="button-addon2">
            <div class="input-group-append">
              <a  onclick="this.href='/search/produk/'+ document.getElementById('search').value" class="btn btn-outline-primary" type="button" id="button-addon2">Cari</a>
            </div>
          </div>
    </div>

    <div class="row">
        @forelse ($slug as $data)
        <div style="padding-bottom: 2%" class="col-sm-3">
            <div style="height: 475px" class="card card-profile">
              <div class="row justify-content-center">
                <div class="col-sm-8 order-sm-8">
                  <div class="card-profile-image">
                    <a href="#">
                      <img style="max-width: 100%; max-height:300px" src="{{url('gambar/'.$data->gambar)}}" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-md-3 pb-0 pb-md-0">
                <div class="d-flex justify-content-between">
                    <span class="badge badge-danger badge-pill mb-3"><a href="{{$data->slug}}">{{$data->nama_kategori}}</a></span>
                    <span class="badge badge-success badge-pill mb-3">Rp.{{$data->harga}}</span>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="text-center">
                  <div class="h4">
                    <?php echo substr($data->nama, 0, 20) ?>...
                  </div>
                  <div class="p font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo substr($data->deskripsi, 0, 30) ?>...
                  </div>
                  <div class=" mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>PENJUAL
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>{{$data->name}}
                  </div>
                </div><br>
                    <a style="float: left" href="/keranjang/add/{{$data->id_produk}}" class="btn btn-sm btn-default"type="button">
                        <span class="btn-inner--text"><i class="fas fa-shopping-basket"></i> Tambah Ke Keranjang</span>
                    </a>
                    <a style="float: right" href="/produk/pesanan/{{$data->id_produk}}" class="btn btn-sm btn-primary"type="button">
                        <span class="btn-inner--text"><i class="fas fa-shopping-bag"></i> Pesan</span>
                    </a>
                </div>
            </div>
          </div>
        @empty
        <p>Data Masih Kosong</p>
        @endforelse
    </div>
</div>

@endsection


