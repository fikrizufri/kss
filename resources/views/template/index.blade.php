@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          <a href="{{route($route.'.create')}}" class="btn btn-sm btn-primary float-right text-light">
            <i class="fa fa-plus"></i> Add Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" role="form" id="form" enctype="multipart/form-data">
            <div class="row">
              @foreach ($searches as $key => $item)
              <div class="col-lg-2">

                <label for="{{$item['name']}}">{{ucfirst($item['alias'])}}</label>
                @include('template.formsearch')
              </div>
              @endforeach

              <div class="col-lg-3">
                <label for="">Action</label>
                <div class="input-group">


                  <button type="submit" class="btn btn-warning">
                    <span class="fa fa-search"></span>
                    Search
                  </button>
                </div>
              </div>
            </div>
          </form>
          <br>
          <table class="table table-bordered " id="datatablesinpu">
            <thead>
              <tr>
                <th width="5%">No</th>
                @foreach ($configHeaders as $key => $header)
                @if (isset($header['alias']))
                <th>{{ucfirst($header['alias'])}}</th>
                @else
                <th>{{ucfirst($header['name'])}}</th>
                @endif
                @endforeach
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($data as $index => $item)

              <tr>
                <td>{{ $index+1+(($data->CurrentPage()-1)*$data->PerPage()) }}</td>
                @foreach ($configHeaders as $key => $header)
                <td>{{ucfirst($item[$header['name']])}}</td>
                @endforeach
                <td class="text-center">
                  @if(isset($button))
                  @foreach ($button as $key => $val)
                  @include('template.button')
                  @endforeach
                  @endif
                  <a href="{{route($route.'.edit',$item->id)}}" class="btn btn-sm btn-warning text-light">
                    <i class="nav-icon fas fa-edit"></i> Edit</a>
                  <form id="form-{{$item->id}}" action="{{ route($route.'.destroy', $item->id)}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                  </form>
                  <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick=deleteconf("{{$item->id}}")>
                    <i class="fa fa-trash"></i> Delete
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="10"> {{ucwords(str_replace('-',' ',$title))}} data does not exist</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">
          {{ $data->links() }}
        </div>
        <!-- /.card-body -->

      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->

  @stop

  @push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  @endpush
  @push('script')
  <!-- DataTables -->
  <script src="{{asset('template/plugins/datatables/jquery.dataTables.js')}}">
  </script>
  <script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script>
    $('#datatablesinpu').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      columnDefs: [{
        orderable: false,
        targets: -1
      }]
    });
  </script>
  @endpush