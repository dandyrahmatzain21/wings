<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="/home">
        <img src="{{asset('argon-template')}}/assets/img/brand/store-white.png">
        <span>UMKM <strong>CIREBON</strong></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                <img src="{{asset('argon-template-front-end')}}/assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <?php $id_customer = optional(Auth::user())->id; ?>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <a href="/all/produk" class="nav-link" role="button">
            <i class="ni ni-ui-04 d-lg-none"></i>
            <span class="nav-link-inner--text">Produk</span>
            </a>
            <a href="/pesanan/{{$id_customer}}" class="nav-link" role="button">
            <i class="ni ni-ui-04 d-lg-none"></i>
            <span class="nav-link-inner--text">Pesanan</span>
            </a>
            <a href="/pembayaran/{{$id_customer}}" class="nav-link" role="button">
            <i class="ni ni-ui-04 d-lg-none"></i>
            <span class="nav-link-inner--text">Pembayaran</span>
            </a>
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            @if ($total_keranjang==!null)
                <li class="nav-item d-none d-lg-block">
                <a href="/keranjang" class="btn btn-default btn-icon">
                    <div class="row">
                        <span class="btn-inner--icon"><i class="fas fa-shopping-basket"></i> Keranjang</span>
                        @if ($total_keranjang==!null)
                        <span class="badge badge-danger">{{$total_keranjang}}</span>
                        @else
                        @endif
                    </div>
                </a>
                </li>
            @else
                <li class="nav-item d-none d-lg-block">
                    <a href="/keranjang/kosong" class="btn btn-default btn-icon">
                        <div class="row">
                            <span class="btn-inner--icon"><i class="fas fa-shopping-basket"></i> Keranjang</span>
                            @if ($total_keranjang==!null)
                            <span class="badge badge-danger">{{$total_keranjang}}</span>
                            @else
                            @endif
                        </div>
                    </a>
                </li>
            @endif

          <?php $level = optional(Auth::user())->level; ?>
          @if ($level == !null)
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{asset('argon-template')}}/assets/img/theme/bootstrap.jpg">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                        <?php $name = optional(Auth::user())->name; ?>
                        <span class="mb-0 text-sm  font-weight-bold"> {{$name}}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="#!" class="dropdown-item">
                <i class="fas fa-user"></i>
                @if (optional(auth()->user())->level==1)
                    <span>Admin</span>
                @elseif (optional(auth()->user())->level==2)
                    <span>Customer</span>
                @elseif (optional(auth()->user())->level==3)
                    <span>Penjual</span>
                @elseif (optional(auth()->user())->level==null)
                    <span>Guest</span>
                @endif
            </a>
            @if (optional(auth()->user())->level==!null)
            <a href="#!" class="dropdown-item">
                <i class="fas fa-envelope"></i>
                <?php $email = optional(Auth::user())->email; ?>
                <span>{{$email}}</span>
            </a>
            @endif
            <div class="dropdown-divider"></div>

            <?php $level = optional(Auth::user())->level; ?>
            @if ($level == !null)
                <div class="dropdown-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm btn-block"><i class="fas fa-power-off"></i> Logout</button>
                    </form>
                </div>
            @else
                <div class="dropdown-item">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-sign-in-alt"></i> Login</a>
                </div>
            @endif
            </div>
        </li>
          @else
          <li class="nav-item d-none d-lg-block">
            <a href="{{ route('login') }}" class="btn btn-success btn-icon">
                <div class="row"><span class="btn-inner--icon"><i class="fas fa-sign-in-alt"></i> Login</span></div>
            </a>
          </li>
          @endif

        </ul>
      </div>
    </div>
  </nav>
</div>
