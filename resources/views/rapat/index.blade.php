@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar {{ucwords(str_replace('-',' ',$title))}}</h3>
          <a href="{{route($route.'.create')}}" class="btn btn-sm btn-primary float-right text-light">
            <i class="fa fa-plus"></i> Create Data
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
          <table class="table table-bordered " id="example">
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
                <th class="text-center">Jumlah Peserta</th>
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
                <td>{{$item->hasAnggota->count() + $item->hasTamu->count() + $item->hasPegawai->count()}}</td>

                <td class="text-center">
                  @if($item->status == 'progress')
                  <a href="{{route($route.'.notulen',$item->id)}}" class="btn btn-sm btn-success text-light">
                    <i class="nav-icon fas fa-edit"></i> Notulen</a>
                  <a href="{{route($route.'.absen',$item->id)}}" class="btn btn-sm btn-primary text-light">
                    <i class="nav-icon fas fa-edit"></i> Absen</a>
                  @endif
                  @if($item->status == 'ready')
                  <a href="{{route($route.'.absen',$item->id)}}" class="btn btn-sm btn-primary text-light">
                    <i class="nav-icon fas fa-edit"></i> Absen</a>
                  <a href="{{route($route.'.edit',$item->id)}}" class="btn btn-sm btn-danger ">
                    <i class="nav-icon fas fa-edit"></i> Edit</a>
                  @endif
                  <a href="{{route($route.'.show',$item->id)}}" class="btn btn-sm btn-warning ">
                    <i class="nav-icon fas fa-edit"></i> Detail</a>

                </td>
              </tr>
              @empty
              <tr>
                <td colspan="10">Data {{ucwords(str_replace('-',' ',$title))}} tidak ada</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          {{ $data->appends(request()->input())->links() }}
        </div>
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
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      columnDefs: [{
        orderable: false,
        targets: -1
      }]
    });
  </script>
  @endpush