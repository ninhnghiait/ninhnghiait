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

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group has-feedback{{ $errors->has('email') ? ' has-warning' : '' }}">
        <input name="email" type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>
      @if (session('status'))
      <!-- /.lockscreen-item -->
      <div class="help-block text-center" style="color: #00a65a;">
        {{ session('status') }}
      </div>
      @endif
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection
