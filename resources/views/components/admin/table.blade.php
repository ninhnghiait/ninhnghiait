<table class="table table-hover">
  <tr>
    @if($checkAll)
    <th><input type="checkbox" id="check-all" name="check_all" class="check-all minimal"></th>
    @endif
    @foreach($tableHeader as $tb)
    <th>{{ $tb }}</th>
    @endforeach
  </tr>
  {{ $tableBody }}
</table>