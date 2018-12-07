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
        Quản lí Article
        <small>danh sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quản lí Article</li>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-striped" id="articles-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Picture</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
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
      },
      error: function (){
        alert('Error!');
      }
    });
  });
</script>
<script>
$(function() {
    $('#articles-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('ad_articles.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'picture', name: 'picture' },
        ]
    });

});
</script>
@endsection