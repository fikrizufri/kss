@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar {{$title}}</h3>

          @if(Auth()->user()->rule != 3)
          <a href="{{route('service.create')}}" class="btn btn-sm btn-primary float-right text-light">
            <i class="fa fa-plus"></i>Tambah Data
          </a>
          @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" role="form" id="form" enctype="multipart/form-data">
            <div class="row">

              <div class="col-lg-2">
                <label for="limit">Batas Perhalaman</label>
                <div class="input-group">
                  <select name="limit" class="selected2 custom-select" id="cmblimit">
                    <option value="all">Semua</option>
                    <option value="5" {{$limit == 5 ? "selected" : ""}}>5</option>
                    <option value="10" {{$limit == 10 ? "selected" : ""}}>10</option>
                    <option value="50" {{$limit == 50 ? "selected" : ""}}>50</option>
                    <option value="100" {{$limit == 100 ? "selected" : ""}}>100</option>
                  </select>
                </div>

              </div>
              <div class="col-lg-4">
                <label for="">No Service</label>
                <div class="input-group">

                  <input type="text" name="kode" class="form-control" id=" kode" value="{{$kode}}">

                </div>
              </div>
              <div class="col-lg-6">
                <label for="">Waktu</label>
                <div class="input-group">

                  <input type="date" name="mulai" class="form-control" id=" mulai" value="{{$mulai}}">
                  <div class="input-group-append">
                  </div>
                  <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02">s/d</label>
                  </div>
                  <input type="date" name="akhir" class="form-control" id=" akhir" value="{{$akhir}}">
                  <button type="submit" class="btn btn-warning">
                    <span class="fa fa-search"></span>
                    Cari
                  </button>
                  <button type="button" class="btn btn-danger" id="print">
                    <span class="fa fa-print"></span>
                    Cetak
                  </button>
                </div>
              </div>
            </div>
          </form>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th>No Service</th>
                <th>Kendaraan</th>
                <th>Jenis</th>
                <th>Uraian Mekanik</th>
                <th>Uraian Gudang</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Total Jumlah</th>
                <th>Sparepart</th>
                <th>Status</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataService as $index => $item)

              <tr>
                @if($limit != "all")
                <td>{{ $index+1+(($dataService->CurrentPage()-1)*$dataService->PerPage()) }}</td>
                @else
                <td>{{$index+1}}</td>
                @endif
                <td>{{$item->no_service}}</td>
                <td>{{$item->nama_kendaraan}}</td>
                <td>{{$item->jenis}}</td>
                <td>{{$item->uraian}}</td>
                <td>{{$item->uraian_gudang}}</td>
                <td>{{tanggal_indonesia($item->tanggal)}}</td>
                <td>{{$item->total_harga}}</td>
                <td>{{$item->total_jumlah}}</td>
                <td>
                  @forelse($item->sparepart as $value)
                  {{ $loop->first ? '' : ', ' }}
                  {{$value->nama}} : jumlah {{ $value->pivot->jumlah}}
                  @empty
                  @endforelse
                  </span>
                </td>
                <td class="totalItem text-center">
                  <span class="badge {{ $item->status === 'hold' ? 'bg-warning' : '' }}  {{ $item->status === 'proses' ? 'bg-danger' : '' }} {{ $item->status === 'selesai' ? 'bg-success' : '' }}">{{strtoupper($item->status)}}</span>

                </td>
                <td class="text-center">
                  <a href="{{route('service.show',$item->id)}}" class="btn btn-danger btn-sm">
                    <i class="fa fa-search"></i> Detail
                  </a>
                  <a href="{{route('service.edit',$item->id)}}" target="_blank" class="btn btn-warning btn-sm">
                    <i class="fa fa-search"></i> Print
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="10">Data {{$title}} tidak ada</td>
              </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>

                <td colspan="9"> </td>
                <td><b> Total</b></td>
                <td><b><span>{{$jumlah}}</span></b></td>
              </tr>
              <tr>

                <td colspan="9"> </td>
                <td><b> Total Harga</b></td>
                <td><b><span>{{$sumSrvice}}</span></b></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
        @if($limit != "all")
        <div class="card-footer clearfix">
          {{ $dataService->appends(request()->input())->links() }}
        </div>
        @endif
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->

  @stop

  @push('script')
  <script>
    $("#print").on('click', function(e) {

      // e.preventDefault();
      $("#form").attr("target", "_blank");
      $("#form").attr("action", "{{route('print.service')}}");
      $("#form").submit();

    });
  </script>
  @endpush