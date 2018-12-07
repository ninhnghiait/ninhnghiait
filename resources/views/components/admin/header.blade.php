@if(in_array('home', $header))
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('templates/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endif
@if(in_array('index', $header))
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('templates/admin/plugins/iCheck/all.css') }}">
@endif
@if(in_array('form', $header))
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('templates/admin/plugins/iCheck/all.css') }}">
  <link rel="stylesheet" href="{{ asset('templates/admin/custom/intl-tel-input-14.0.0/build/css/intlTelInput.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('templates/admin/bower_components/select2/dist/css/select2.min.css') }}">
@endif

