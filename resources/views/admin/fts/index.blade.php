@extends('templates.admin.master')
@section('header')
  <?php $header = ['index'] ?>
  @component('components.admin.header', ['header' => $header])
  @endcomponent
@endsection
@section('footer')
  <?php $footer = ['index'] ?>
  @component('components.admin.footer', ['footer' => $footer])
  @endcomponent
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Full Text Search
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Full Text Search</li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <form action="{{ route('ad_fts.search') }}" method="post">
                @csrf
                <div class="box-tool col-md-3 col-sm-4 col-xs-8" style="float: right">
                  <div class="input-group form-group">
                      <input type="text" name="name" class="form-control pull-right" placeholder="Search" value="{{ session('search') ? session('search')['name'] : '' }}">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php $tableHeader = ['ID', 'title']; ?>
              @component('components.admin.table', ['tableHeader' => $tableHeader, 'checkAll' => false])
              @slot('tableBody')
                @forelse($items as $item)
                @php
                $id = $item['id'];
                $name = $item['name'];
                @endphp
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $name }}</td>
                </tr>
                @empty
                <tr><td colspan="{{ count($tableHeader) + 1 }}">No data!</td></tr>
                @endforelse
              @endslot
              @endcomponent

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $items->links() }}
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
