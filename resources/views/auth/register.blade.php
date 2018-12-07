@extends('templates.admin.master_auth')
@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="javascript:;"><b>NinhNghia</b>IT</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register</p>

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-group has-feedback{{ $errors->has('fullname') ? ' has-warning' : '' }}">
        <input id="fullname" name="fullname" type="text" class="form-control" placeholder="{{ __('Full Name') }}" value="{{ old('fullname') }}" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('fullname'))
        <span class="help-block">{{ $errors->first('fullname') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-warning' : '' }}">
        <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-warning' : '' }}">
        <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-warning' : '' }}">
        <input id="password_confirm" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
