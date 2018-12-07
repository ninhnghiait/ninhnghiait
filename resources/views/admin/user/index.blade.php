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
        Quản lí User
        <small>danh sách</small>
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
      <form id="dellmore" action="{{ route('ad_users.dellmore') }}" method="post" class="form-horizontal form-label-left">
      @csrf
      </form>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="{{ route('ad_users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a></h3>
			        <p class="box-title text-info" id="total-check"></p>
              <form action="{{ route('ad_users.search') }}" method="post">
                @csrf
                @if (session('search'))
                  @php
                  $search = session('search');
                  $q = $search['q'];
                  $group_id = $search['group_id'];
                  @endphp
                @else
                  @php
                  $q = '';
                  $group_id = 0;
                  @endphp
                @endif
                <div class="box-tool col-md-3 col-sm-4 col-xs-8" style="float: right">
                  <div class="input-group form-group">
                      <input type="text" name="q" class="form-control pull-right" placeholder="Search" value="{{ $q }}">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                  </div>
                </div>
                <div class="box-tool col-md-3 col-sm-4 col-xs-8" style="float: right">
                  <div class="form-group">
                    <select name="group_id" class="form-control">
                      <option value="">-- Tất cả group --</option>
                      @foreach ($groups as $group)
                        <option value="{{ $group['id'] }}" {{ $group_id == $group['id'] ? 'selected' : ''}} >{{ $group['name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php $tableHeader = ['ID', 'Username(Fullname)', 'Group', 'Avatar', 'Email', 'Phone', 'Active', 'Adress', 'Action']; ?>
              @component('components.admin.table', ['tableHeader' => $tableHeader, 'checkAll' => true])
              @slot('tableBody')
                @forelse($items as $item)
                @php
                $id = $item['id'];
                $name = $item['name'];
                $fullname = $item['fullname'];
                $avatar = $item['avatar_user'];
                $email = $item['email'];
                $address = $item['address'];
                $active = $item['active'];
                $emailVerifiedAt = $item['email_verified_at'];
                $phoneNumber = $item['phoneNumber']['e164_format'];
                $groups = implode(' | ', $item['groups']->pluck('name')->toArray());
                $urlEdit = route('ad_users.edit', $id);
                $urlDel = route('ad_users.destroy', $id);
                @endphp
                <tr>
                  <td><input type="checkbox" class="check minimal" name="dels[]" form="dellmore" value="{{ $id }}" ></td>
                  <td>{{ $id }}</td>
                  <td>{{ $fullname }}( {{$name}} )</td>
                  <td>{{ $groups }}</td>
                  <td width="10%">
                    <img width="100%" class="img-thumbnail" src="{{ asset('storage/app/files/users/'.$avatar) }}" alt="" style="border-radius: 50%;">
                  </td>
                  <td>{{ $email }}</td>
                  <td>{{ $phoneNumber }}</td>
                  <td><input type="checkbox" class="active-user minimal" name="active" {{ $active ? 'checked' : '' }} value="{{ $id }}"></td>
                  <td>{{ $address }}</td>
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
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="no-margin pull-left">
                <input form="dellmore" type="submit" class="btn" value="Delete" name="submit">
              </div>
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
@section('js')
<script>
  $('.del').click(function() {
    if(confirm('Are you sure!')) $(this).next().submit();
  });
  $('.active-user').on('ifChanged', function (event) {
    var id = $(this).val();
    $.ajax({
      url: "{{ route('ad_users.active') }}",
      type: 'POST',
      cache: false,
      data: {id: id, _token: '{{ csrf_token() }}'},
      success: function(data){
        //$('.activen-' + active.val()).prop('checked', active.prop('checked'));
      },
      error: function (){
        alert('Error!');
      }
    });
  });
</script>
@endsection