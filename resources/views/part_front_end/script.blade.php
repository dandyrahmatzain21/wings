<!--   Core JS Files   -->
<script src="{{asset('argon-template-front-end')}}/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/moment.min.js"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/plugins/bootstrap-datepicker.min.js"></script>
<!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{asset('argon-template-front-end')}}/assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
  window.TrackJS &&
    TrackJS.install({
      token: "ee6fab19c5a04ac1a32a645abde4613a",
      application: "argon-design-system-pro"
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
</script><!-- Penjualan JS -->
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

<script type="text/javascript">
    $("#a").keyup(function(){
        var a = ($("#a").val());
        var c = a;
        $("#no_transfer").val(c);
    });

    $("#no_transfer").keyup(function(){
        var a = ($("#no_transfer").val());
        var c = a;
        $("#no_transfer").val(c);
    });
</script>

