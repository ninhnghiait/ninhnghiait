@extends('templates.admin.master_auth')
@section('content')
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="javascript:;"><b>NinhNghia</b>It</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">{{ __('Verify Your Email Address') }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('templates/admin/dist/img/user1-128x128.jpg') }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <span class="form-control" placeholder="fullname">{{ Auth::user()->fullname }}</span>
        <div class="input-group-btn">
          <a href="{{ route('verification.resend') }}" class="btn"><i class="fa fa-arrow-right text-muted"></i></a>
        </div>
      </div>
    </form>

  </div>
  @if (session('resent'))
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color: #00a65a;">
    {{ __('A fresh verification link has been sent to your email address.') }}
  </div>
  @endif
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    {{ __('Before proceeding, please check your email for a verification link.') }}
  </div>
  <div class="text-center">{{ __('If you did not receive the email') }},
    <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
  </div>
  {{-- <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>
    All rights reserved
  </div> --}}
</div>
<!-- /.center -->
@endsection
