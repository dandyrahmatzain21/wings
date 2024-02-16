<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    @if (optional(auth()->user())->level==null)
                    <h6 class="h2 text-white d-inline-block mb-0"></h6>
                    <div class="h2 text-white d-inline-block mb-0" class="row">
                        <img src="{{asset('argon-template')}}/assets/img/brand/store-white.png" style="width: 8%" class="navbar-brand-img" alt="...">

                        <a style="padding: 2%;" class="navbar-brand" href="javascript:void(0)">
                            <h1 class="text-white">UMKM<strong class="text-white"> CIREBON</strong></h1>
                        </a>
                    </div>
                    @else
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Default</li>
                        </ol>
                    </nav>
                    @endif
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
