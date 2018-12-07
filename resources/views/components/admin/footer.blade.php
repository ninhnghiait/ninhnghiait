@if(in_array('home', $footer))
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('templates/admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="{{ asset('templates/admin/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('templates/admin/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('templates/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('templates/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('templates/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('templates/admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('templates/admin/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('templates/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('templates/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('templates/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('templates/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('templates/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('templates/admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('templates/admin/dist/js/demo.js') }}"></script>
@endif
@if(in_array('index', $footer))
<!-- DataTables -->
<script src="{{ asset('templates/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('templates/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('templates/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('templates/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('templates/admin/dist/js/demo.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('templates/admin/plugins/iCheck/icheck.min.js') }}""></script>
<!-- page script -->
<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    $('#check-all').on('ifChecked', function(event) {
      $('.check').iCheck('check'); $('#total-check').html('<small>Total: ' + $('.check').filter(':checked').length + ' selected</small>');
    });
    $('#check-all').on('ifUnchecked', function(event) {
      $('.check').iCheck('uncheck'); $('#total-check').html('');
    });
    // Removed the checked state from "All" if any checkbox is unchecked
    // $('#check-all').on('ifChanged', function(event){
    //   if(!this.changed) {
    //     this.changed=true;
    //     $('#check-all').iCheck('check');
    //   } else {
    //     this.changed=false;
    //     $('#check-all').iCheck('uncheck');
    //   }
    //   $('#check-all').iCheck('update');
    // });
    // // Remove the checked state from "All" if any checkbox is unchecked
    $('.check').on('ifChanged', function (event) {
        // $('#check-all').iCheck('uncheck');
        $('#total-check').html('<small>Total: ' + $('.check').filter(':checked').length + ' selected</small>');
    });
    // // Make "All" checked if all checkboxes are checked
    // $('.check').on('ifChecked', function (event) {
    //     if ($('.check').filter(':checked').length == $('.check').length) {
    //         $('#check-all').iCheck('check');
    //     }
    // });


  </script>
@endif
@if(in_array('form', $footer))
<!-- SlimScroll -->
<script src="{{ asset('templates/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('templates/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('templates/admin/dist/js/demo.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('templates/admin/plugins/iCheck/icheck.min.js') }}""></script>
<script src="{{ asset('templates/admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('templates/admin/custom/intl-tel-input-14.0.0/build/js/intlTelInput.min.js') }}"></script>
@endif