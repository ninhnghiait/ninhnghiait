@extends('templates.admin.master_auth')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>NinhNghia</b>IT</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ __('Reset Password') }}</p>

    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-warning' : '' }}">
        <input name="email" type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" value="{{ $email ?? old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-warning' : '' }}">
        <input name="password" type="password" class="form-control" placeholder="{{ __('Password') }}"  required >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input name="password_confirmation" id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" required >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Reset Password') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a><br>
    <a href="{{ route('register') }}" class="text-center">{{ __('Register a new membership') }}</a>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection
