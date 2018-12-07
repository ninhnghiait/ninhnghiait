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
        Permission
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permission</li>
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
              <h3 class="box-title"><a href="{{ route('ad_permissions.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php $tableHeader = ['ID', 'Name', 'Display Name', 'Description','Action']; ?>
              @component('components.admin.table', ['tableHeader' => $tableHeader, 'checkAll' => false])
              @slot('tableBody')
                @forelse($items as $item)
                @php
                $id = $item['id'];
                $name = $item['name'];
                $displayName = $item['display_name'];
                $description = $item['description'];
                $avatar = $item['avatar_user'];
               
                $urlEdit = route('ad_permissions.edit', $id);
                $urlDel = route('ad_permissions.destroy', $id);
                @endphp
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $name }}</td>
                  <td>{{ $displayName }}</td>
                  <td>{{ $description }}</td>
                  <td>
                    <a href="{{ $urlEdit }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:;" class="del btn btn-warning btn-sm" style="margin-top: 3px"><i class="fa fa-trash"></i> Delete</a>
                    <form action="{{ $urlDel }}" method="post" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
                  </td>
                </tr>
                @empty
                <tr><td colspan="{{ count($tableHeader) + 1 }}">No data!</td></tr>
                @endforelse
              @endslot
              @endcomponent
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
<script>
  $('.del').click(function() {
    if(confirm('Are you sure!')) $(this).next().submit();
  });
</script>
@endsection