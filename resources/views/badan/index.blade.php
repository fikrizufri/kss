@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar {{$title}}</h3>
          <a href="{{route($route.'.create')}}" class="btn btn-sm btn-primary float-right text-light">
            <i class="fa fa-plus"></i>Create Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" role="form" id="form" enctype="multipart/form-data">
            <div class="row">

              <div class="col-lg-3">
                <label for="nama">Nama</label>
                <div class="input-group">
                  <input type="text" name="nama" class="form-control" id=" nama" value="{{$nama}}">
                </div>

              </div>


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
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th width="20%">Nama</th>
                <th>Keterangan</th>
                <th class="text-center" width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataBadan as $index => $item)

              <tr>
                <td>{{ $index+1+(($dataBadan->CurrentPage()-1)*$dataBadan->PerPage()) }}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->keterangan}}</td>
                <td class="text-center">
                  <a href="{{route($route.'.edit',$item->id)}}" class="btn btn-sm btn-warning text-light">
                    <i class="nav-icon fas fa-edit"></i> Edit</a>
                  <form id="form-{{$item->id}}" action="{{ route($route.'.destroy', $item->id)}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                  </form>
                  <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick=deleteconf("{{$item->id}}")>
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="10">Data {{$title}} tidak ada</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          {{ $dataBadan->appends(request()->input())->links() }}
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->

  @stop

  @push('script')

  @endpush