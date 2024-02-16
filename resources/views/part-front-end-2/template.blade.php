<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wings Store</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('front-end-2')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('front-end-2')}}/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('front-end-1')}}/css/main.css">

    <!-- Custom styles for this page -->
    <link href="{{asset('front-end-2')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('part-front-end-2/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('part-front-end-2/topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">@yield('judul_halaman')</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!--<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>-->
                        <div class="card-body">
                            @yield('konten')
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dandy Rahmat Zain 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="{{asset('front-end-2')}}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('front-end-2')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('front-end-2')}}/js/demo/chart-pie-demo.js"></script>
    <script src="{{asset('front-end-2')}}/js/demo/chart-bar-demo.js"></script>

    <script type="text/javascript">
        $("#jumlah").keyup(function(){
            var a = parseFloat($("#jumlah").val());
            var b = parseFloat($("#harga").val());
            var c = a*b;
            $("#subtotal").val(c);
        });

        $("#harga").keyup(function(){
            var a = parseFloat($("#jumlah").val());
            var b = parseFloat($("#harga").val());
            var c = a*b;
            $("#subtotal").val(c);
        });
    </script>
    <script type="text/javascript" src="{{asset('DataTables')}}/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#dataTable').DataTable({
                language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
            });
        } );
    </script>

    @livewireScripts
</body>

</html>


