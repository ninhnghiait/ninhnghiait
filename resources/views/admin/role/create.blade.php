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
        Role
        <small>Create</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Role</li>
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
              <h3 class="box-title">Create Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('ad_roles.store') }}" method="post" enctype="multipart/form-data">
              <div class="box-body">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-nc">
                        <label>Name</label>
                        <div class="form-group input-group">
                          <input name="name" value="{{ old('name') }}" type="text" class="form-control" style="width: 100%;" required="">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        @if($errors->has('name'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-nc">
                        <label>Display name</label>
                        <div class="form-group input-group">
                          <input name="display_name" value="{{ old('display_name') }}" type="text" class="form-control" style="width: 100%;">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        @if($errors->has('display_name'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('display_name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                        <span class="nc-error"><i class="fa fa-times-circle-o"></i> {{ $errors->first('description') }}</span>
                        @endif
                      </div>
                      
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{session('routejt') ?: url()->previous()}}" class="btn btn-default">Cancel</a>
                {{-- <button type="submit" class="btn btn-info pull-right">Save</button> --}}
                <div class="dropdown">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>

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