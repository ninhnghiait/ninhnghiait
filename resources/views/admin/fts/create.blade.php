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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FTS
        <small>add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">FTS</li>
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
              <h3 class="box-title">Add</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('ad_fts.store') }}" method="post" enctype="multipart/form-data">
              <div class="box-body">
                  @csrf
                  <input type="hidden" name="cat_id" value="1">
                  <input type="hidden" name="picture" value="NN1542384561W4OKP.jpg">
                  <input type="hidden" name="user_id" value="1">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-nc">
                        <label>Username</label>
                        <div class="form-group input-group">
                          <input name="name" value="{{ old('name') }}" type="text" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        @if($errors->has('name'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Preview</label>
                        <div class="form-group input-group">
                          <textarea name="preview" style="width: 100%"  class="form-control">{{ old('preview') }}</textarea>
                        </div>
                        @if($errors->has('preview'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('preview') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      <div class="form-nc">
                        <label>Detail</label>
                        <div class="form-group input-group">
                          <textarea name="detail" class="form-control">{{ old('detail') }}</textarea>
                        </div>
                        @if($errors->has('detail'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('detail') }}</span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                      
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