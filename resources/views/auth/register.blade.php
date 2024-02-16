<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cirebon UMKM Store</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('front-end-2')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('front-end-2')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register">
                        <img class="img-fluid" src="{{asset('front-end-1')}}/img/banner/logo.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>


                            <form role="form" method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                                <div class="form-group">
                                        <input id="name"  type="text" class="form-control form-control-user  @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}"
                                            required autocomplete="name"
                                            autofocus
                                            placeholder="Full Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="customer_phone" type="number"
                                    name="customer_phone"
                                    value="{{ old('customer_phone') }}"
                                    required autocomplete="customer_phone" class="form-control form-control-user @error('customer_phone') is-invalid @enderror"
                                    placeholder="No Handphone">
                                    @error('customer_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="customer_address"
                                    name="customer_address" value="{{ old('customer_address') }}"
                                    required autocomplete="customer_address" class="form-control form-control-user @error('customer_address') is-invalid @enderror"
                                    placeholder="Address">
                                    @error('customer_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="email"
                                    name="email" value="{{ old('email') }}"
                                    required autocomplete="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                    placeholder="Email">
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input id="password" type="password"
                                        type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password"
                                        required autocomplete="new-password"
                                        placeholder="Password">
                                        @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password-confirm" type="password"
                                        name="password_confirmation"
                                        required autocomplete="new-password"
                                        type="password" class="form-control form-control-user"
                                        placeholder="Password Confirmed">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <select name="level" id="level" class="form-control @error('level') is-invalid @enderror" value="{{old('level')}}">
                                        <option value="">Pilih Role</option>
                                        <option value="2">Saya Ingin Menjadi Customer</option>
                                        <option value="3">Saya Ingin Menjadi Penjual</option>
                                    </select>
                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <input id="status" type="hidden" class="form-control form-control-user @error('status') is-invalid @enderror" name="status" value="1" placeholder="Status" required autocomplete="status">
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('front-end-2')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('front-end-2')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('front-end-2')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('front-end-2')}}/js/sb-admin-2.min.js"></script>

</body>

</html>
