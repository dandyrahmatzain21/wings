<script src="{{asset('argon-template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="{{asset('argon-template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('argon-template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="{{asset('argon-template')}}/assets/js/argon.js?v=1.2.0"></script>
<!-- Jquery Penjumlahan Otomatis -->
<script src="{{asset('argon-template')}}/assets/js/jquery.js"></script>
<!-- Penjualan JS -->
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
        $('#tabel').DataTable({
            language : {url:"{{asset('DataTables')}}/DataTables-1.10.24/js/dataTables.indonesia.js"}
        });
    } );
</script>
