<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img style="margin: 10%" width="30%" src="{{asset('front-end-2')}}/img/store-white.png" class="navbar-brand-img" alt="...">
        </div>
    <!--<div class="sidebar-brand-text mx-3">E-Commerce UMKM Cirebon <sup>2</sup></div>-->
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (optional(auth()->user())->level==1)

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_produk"
                aria-expanded="true" aria-controls="collapse_produk">
                <i class="fas fa-box"></i>
                <span>Produk</span>
            </a>
            <div id="collapse_produk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/produk">List Produk</a>
                    <a class="collapse-item" href="/list_verifikasi_produk">Verifikasi Produk</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_kategori"
                aria-expanded="true" aria-controls="collapse_kategori">
                <i class="fas fa-layer-group"></i>
                <span>Kategori</span>
            </a>
            <div id="collapse_kategori" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/add/kategori/">Tambah Kategori</a>
                    <a class="collapse-item" href="/kategori/">List Kategori</a>
                </div>
            </div>
        </li>

        <!--
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_pembayaran"
                aria-expanded="true" aria-controls="collapse_pembayaran">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembayaran</span>
            </a>
            <div id="collapse_pembayaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/list_pembayaran">List Pembayaran</a>
                    <a class="collapse-item" href="/list_verifikasi">Verifikasi</a>
                </div>
            </div>
        </li>
        -->

    <li>
        <?php $level_user = auth()->user()->level ?>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#pembayaran">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembayaran</span></a>
        </li>
        <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="form-group">
                                <label for="kode_pembayaran">Kode Pembayaran</label>
                                <input type="text" name="kode_pembayaran" class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran" value="{{old('kode_pembayaran')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </button>
                        <a href="" onclick="this.href='/cari_kode_pembayaran/{{$level_user}}/'+ document.getElementById('kode_pembayaran').value" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Cari</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </li>

        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-book"></i>
                <span>Laporan</span></a>
        </li>

    @elseif (optional(auth()->user())->level==3)
        <?php $id_penjual = Auth::user()->id; ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_produk"
                aria-expanded="true" aria-controls="collapse_produk">
                <i class="fas fa-box"></i>
                <span>Produk</span>
            </a>
            <div id="collapse_produk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/add/produk">Tambah Produk</a>
                    <a class="collapse-item" href="/produk/{{$id_penjual}}">List Produk</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/pesanan{{$id_penjual}}">
                <i class="fas fa-shopping-bag"></i>
                <span>Pesanan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_pembayaran"
                aria-expanded="true" aria-controls="collapse_pembayaran">
                <i class="fas fa-wallet"></i>
                <span>Pembayaran</span>
            </a>
            <div id="collapse_pembayaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/pembayaran{{$id_penjual}}">List Pembayaran</a>
                    <a class="collapse-item" href="/list_verifikasi/{{$id_penjual}}">Verifikasi</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_laporan"
                aria-expanded="true" aria-controls="collapse_laporan">
                <i class="fas fa-book"></i>
                <span>Laporan</span>
            </a>
            <div id="collapse_laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/laporan/penjualan/{{$id_penjual}}">Laporan Penjualan</a>
                    <a class="collapse-item" href="/laporan/produk/{{$id_penjual}}">Laporan Produk</a>
                </div>
            </div>
        </li>

    @elseif (optional(auth()->user())->level==4)
    <?php $id_alfamart = auth()->user()->id ?>
    <li class="nav-item">
        <a class="nav-link" href="/list_pembayaran_alfamart/{{$id_alfamart}}">
            <i class="fas fa-dollar-sign"></i>
            <span>List Pembayaran</span></a>
    </li>

    <li>
        <?php $level_user = auth()->user()->level ?>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#pembayaran">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembayaran</span></a>
        </li>
        <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="form-group">
                                <label for="kode_pembayaran">Kode Pembayaran</label>
                                <input type="text" name="kode_pembayaran" class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran" value="{{old('kode_pembayaran')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </button>
                        <a href="" onclick="this.href='/cari_kode_pembayaran/{{$level_user}}/'+ document.getElementById('kode_pembayaran').value" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Cari</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/laporan">
            <i class="fas fa-book"></i>
            <span>Laporan</span></a>
    </li>

    @elseif (optional(auth()->user())->level==5)
    <?php $id_indomart = auth()->user()->id ?>
    <li class="nav-item">
        <a class="nav-link" href="/list_pembayaran_indomart/{{$id_indomart}}">
            <i class="fas fa-dollar-sign"></i>
            <span>List Pembayaran</span></a>
    </li>

    <li>
        <?php $level_user = auth()->user()->level ?>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#pembayaran">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembayaran</span></a>
        </li>
        <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="form-group">
                                <label for="kode_pembayaran">Kode Pembayaran</label>
                                <input type="text" name="kode_pembayaran" class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran" value="{{old('kode_pembayaran')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </button>
                        <a href="" onclick="this.href='/cari_kode_pembayaran/{{$level_user}}/'+ document.getElementById('kode_pembayaran').value" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Cari</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/laporan">
            <i class="fas fa-book"></i>
            <span>Laporan</span></a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
