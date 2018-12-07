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

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
              <p>Full Text Search</p>
            </div>
            <div class="box-body">
              <form action="" method="POST" role="form">
                <legend>Full Text Search</legend>
              
                <div class="form-group">
                  <label for="">title</label>
                  <input type="text" class="form-control" id="search" list="browsers" placeholder="title search">
                  <datalist id="browsers"></datalist>
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="result-search">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                </tr>
                
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
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script>
        $(document).ready(function() {
            var client = algoliasearch('N3D2Z2NBAD', 'e4ec6dbda2823f188fd05cca00219147');
            var index = client.initIndex('articles_index')
            $('body').on('keyup', '#search', function(event) {
                event.preventDefault();
                index.search({
                    query: $(this).val(),
                    hitsPerPage: 10,
                },
                function searchDone(err, content) {
                    if (err) throw err;
                    content.hits.forEach(el => {
                        //$('#browsers').append(`<option value="${el.name}">`)
                    $('#result-search').append(`<tr> <td>${el.id}</td> <td>${el.name}</td> </tr>`) })
                });
            });
        });
    </script>
@endsection
