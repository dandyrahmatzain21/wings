<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('front-end-1')}}/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                    <?php $id_customer = optional(Auth::user())->id; ?>
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/all/produk">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="/pesanan/{{$id_customer}}">Pesanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/pembayaran/{{$id_customer}}">Pembayaran</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if ($total_keranjang==!null)
                            <li class="nav-item">
                                <a href="/keranjang" class="cart"><span class="lnr lnr-cart"></span></a>
                                @if ($total_keranjang==!null)
                                <span class="badge badge-danger">{{$total_keranjang}}</span>
                                @else
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/keranjang/kosong" class="cart"><span class="lnr lnr-cart"></span></a>
                                @if ($total_keranjang==!null)
                                <span class="badge badge-danger">{{$total_keranjang}}</span>
                                @else
                                @endif
                            </li>
                        @endif
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>

                            <?php $level = optional(Auth::user())->level; ?>
                        @if ($level == !null)
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="cart"><span class="lnr lnr-exit"></span></button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="cart"><span class="lnr lnr-enter"></span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" name="search_input" placeholder="Search Here">
                <a  onclick="this.href='/search/produk/'+ document.getElementById('search_input').value" class="genric-btn info-border radius">Search</a>
            </form>
        </div>
    </div>
</header>
