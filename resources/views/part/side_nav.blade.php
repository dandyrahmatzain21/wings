<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('argon-template')}}/assets/img/brand/store.png" class="navbar-brand-img" alt="..."><br>
                <h1>UMKM<strong class="text-primary"> CIREBON</strong></h1>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                </li>
                    @if (optional(auth()->user())->level==1)
                        <li class="nav-item">
                            <a class="nav-link active" href="/">
                                <i class="ni ni-tv-2 text-default"></i>
                                <span class="nav-link-text text-darker">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cube text-primary"></i>
                            <span class="mb-0 text-default">Produk</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="produk" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-primary"></i>
                                    <span>List Produk</span>
                                </a>
                                <a href="/list_verifikasi_produk" class="dropdown-item">
                                    <i class="fas fa-cubes text-primary"></i>
                                    <span>Verifikasi Produk</span>
                                </a>
                            </div>
                        </li>

                        <!--<?php $id_penjual = Auth::user()->id; ?>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-layer-group text-yellow"></i>
                                <span class="mb-0 text-default">Kategori</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/add/kategori/" class="dropdown-item">
                                    <i class="fas fa-plus text-yellow"></i>
                                    <span>Tambah Kategori</span>
                                </a>
                                <a href="/kategori" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-yellow"></i>
                                    <span>List Kategori</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wallet text-success"></i>
                                <span class="mb-0 text-default">Pembayaran</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/list_pembayaran" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-success"></i>
                                <span>List Pembayaran</span>
                            </a>
                            <a href="/list_verifikasi" class="dropdown-item">
                                <i class="fas fa-money-check text-success"></i>
                                <span>Verifikasi</span>
                            </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/laporan">
                                <i class="fas fa-book text-warning"></i>
                                <span class="nav-link-text text-default">Laporan</span>
                            </a>
                        </li>

                    @elseif (optional(auth()->user())->level==2)
                        <?php $id_customer = Auth::user()->id; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/all/produk">
                                <i class="fas fa-cube text-primary"></i>
                                <span class="nav-link-text text-default">Produk</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/pesanan/{{$id_customer}}">
                                <i class="fas fa-shopping-bag text-success"></i>
                                <span class="nav-link-text text-default">Pesanan</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/pembayaran/{{$id_customer}}">
                                <i class="fas fa-wallet text-danger"></i>
                                <span class="nav-link-text text-default">Pembayaran</span>
                            </a>
                        </li>
                    @elseif (optional(auth()->user())->level==3)
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="ni ni-tv-2 text-default"></i>
                            <span class="nav-link-text text-darker">Dashboard</span>
                        </a>
                    </li>
                    <?php $id_penjual = Auth::user()->id; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cube text-primary"></i>
                            <span class="mb-0 text-default">Produk</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="/add/produk" class="dropdown-item">
                                    <i class="fas fa-plus text-primary"></i>
                                    <span>Tambah Produk</span>
                                </a>
                                <a href="/produk/{{$id_penjual}}" class="dropdown-item">
                                    <i class="fas fa-clipboard-list text-primary"></i>
                                    <span>List Produk</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/pesanan{{$id_penjual}}">
                                <i class="fas fa-shopping-bag text-success"></i>
                                <span class="nav-link-text text-default">Pesanan</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wallet text-danger"></i>
                                <span class="mb-0 text-default">Pembayaran</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/pembayaran{{$id_penjual}}/" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-danger"></i>
                                <span>List Pembayaran</span>
                            </a>
                            <a href="/list_verifikasi/{{$id_penjual}}" class="dropdown-item">
                                <i class="fas fa-money-check text-danger"></i>
                                <span>Verifikasi</span>
                            </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wallet text-danger"></i>
                                <span class="mb-0 text-default">Laporan</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                            <a href="/laporan/penjualan/{{$id_penjual}}/" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-danger"></i>
                                <span>Laporan Penjualan</span>
                            </a>
                            <a href="/laporan/produk/{{$id_penjual}}/" class="dropdown-item">
                                <i class="fas fa-money-check text-danger"></i>
                                <span>Laporan Produk</span>
                            </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
  </nav>
