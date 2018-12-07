@extends('templates.admin.master')
@section('header')
  <?php $header = ['form'] ?>
  @component('components.admin.header', ['header' => $header])
  @endcomponent
@endsection
@section('footer')
  <?php $footer = ['form'] ?>
  @component('components.admin.footer', ['footer' => $footer])
  @endcomponent
@endsection
@section('css')
<style>.form-nc .form-group { margin-bottom: 0;} .nc-error {color: #dd4b39;display: block; margin-top: 5px; margin-bottom: 10px;} .intl-tel-input {width: 100%} .bootstrap-filestyle { width: 100% }</style>
@endsection
@section('content')
@php
$id = $user['id'];
$name = $user['name'];
$email = $user['email'];
$fullname = $user['fullname'];
$address = $user['address'];
$phone = $user['phone'];
$active = $user['active'];
$avatar = $user['avatar_user'];
$emailVerifiedAt = $user['email_verified_at'];
$groupsId = $user['groups']->pluck('id')->toArray();
$phoneNumber = $user['phoneNumber'];
$nationalNumber = $phoneNumber['national_number'];
$regionCode = $phoneNumber['region_code'];
@endphp
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Quản lí User <small>edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quản lí User</li>
      </ol>
    </section>
    
    @if(session('msg'))
      @component('components.admin.alert-info', ['msg' => session('msg')])
      @endcomponent
    @endif
    <!-- Main content -->
    <section class="content">
       <!-- /.row -->
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('ad_users.update', $id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-nc">
                        <label>Username</label>
                        <div class="form-group input-group">
                          <input name="name" value="{{ old('name', $name) }}" type="text" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        @if($errors->has('name'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Email</label>
                        <div class="form-group input-group">
                          <input name="email" value="{{ old('email', $email) }}" type="email" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        </div>
                        @if($errors->has('email'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Password</label>
                        <div class="form-group input-group">
                          <input name="password" value="{{ old('password') }}" type="password" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        </div>
                        @if($errors->has('password'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Group</label>
                        <select name="groups[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Group" style="width: 100%;">
                        @php
                        $oldGroups = old('groups') ?: $groupsId;
                        @endphp
                        @foreach($groups as $group)
                          <option value="{{ $group['id'] }}" {{in_array($group['id'], $oldGroups) ? 'selected' : ''}} >{{ $group['name'] }}</option>
                        @endforeach
                        </select>
                        @if($errors->has('groups'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('groups') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Active</label> &nbsp;&nbsp;
                        <input type="checkbox" name="activefr" class="minimal" {{ old('activefr', $active) ? 'checked' : '' }} >
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Avatar</label>
                        <div class="form-group input-group" style="width: 100%">
                          <input type="file" class="form-control" name="avatarfr" id="cleardemo" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);">
                        </div>
                        <button class="btn" id="clear" style="margin-top: 5px"><i class="fa fa-trash"></i> Clear file</button>
                        @if($errors->has('avatarfr'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('avatarfr') }}</span>
                        @endif
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-nc">
                        <label>Fullname</label>
                        <div class="form-group input-group">
                          <input name="fullname" value="{{ old('fullname', $fullname) }}" type="text" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        </div>
                        @if($errors->has('fullname'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('fullname') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Address</label>
                        <div class="form-group input-group">
                          <input name="address" value="{{ old('address', $address) }}" type="text" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        </div>
                        @if($errors->has('address'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('address') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Phone</label>
                        <div class="form-group input-group" style="width: 100%">
                          <input name="phone_number" value="{{ old('phone_number', $nationalNumber) }}" type="text" class="phone_number form-control" id="phone" style="width: 100%;">
                          <input type="hidden" name="region_code" id="region_code">
                        </div>
                        @if($errors->has('phone_number'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('phone_number') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <img id="avatar" src="{{ asset('/storage/app/files/users/'.$avatar) }}" alt="" class="img-thumbnail" style="border-radius: 50%" width="35%">
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{session('routejt') ?: url()->previous()}}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
            </form>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
<!-- Select2 -->
<script src="{{ asset('templates/admin/custom/bootstrap-filestyle.min.js') }}"></script>
<script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      excludeCountries: ["vn"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      onlyCountries: [ 'vn', 'us', 'gb', 'ch', 'ca'],
      placeholderNumberType: "MOBILE",
      preferredCountries: ["vn", 'us'],
      // separateDialCode: true,
      utilsScript: "{{ asset('templates/admin/custom/intl-tel-input-14.0.0/build/js/utils.js') }}",
    });
    
    @if(!is_null(old('region_code')))
    iti.setCountry("{{ old('region_code', $regionCode) }}");
    @else
    iti.setCountry("vn");
    @endif
    var countryData = iti.getSelectedCountryData();
    $("#region_code").val(countryData.iso2);
    $("#phone").on("countrychange", function(e, countryData) {
      var countryData = iti.getSelectedCountryData();
      $(this).parents('.form-group').find('#region_code').val(countryData.iso2);
    });
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2();
    });
  </script>
  <script>
   $('#cleardemo').filestyle({
    buttonText : ' Choose a file',
    buttonName : 'btn-info'
   });

   $('#clear').click(function() {
    $('#cleardemo').filestyle('clear');
    $('#avatar').attr('src', '/storage/app/files/defaults/logo-default.png');
    return false;
   }); 

   function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#avatar').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }   
  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })               
</script>
@endsection