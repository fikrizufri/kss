@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail {{$title}}</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="form-group">
                        <div>
                            <label for="no_service" class=" form-control-label">No Service</label>
                        </div>
                        <div>
                            <input type="text" name="no_service" placeholder="no_service" id="no_service" class="form-control  {{$errors->has('no_service') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->no_service}}" readonly>
                        </div>
                        @if ($errors->has('no_service'))
                        <span class="text-danger">
                            <strong id="textno_service">{{ $errors->first('no_service')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="kendaraan" class=" form-control-label">Kendaraan Service</label>
                        </div>
                        <div>
                            <input type="text" name="kendaraan" placeholder="kendaraan" id="kendaraan" class="form-control  {{$errors->has('kendaraan') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->nama_kendaraan}}" readonly>
                        </div>
                        @if ($errors->has('kendaraan'))
                        <span class="text-danger">
                            <strong id="textkendaraan">{{ $errors->first('kendaraan')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="kendaraan" class=" form-control-label">No Mesin Kendaraan</label>
                        </div>
                        <div>
                            <input type="text" name="kendaraan" placeholder="kendaraan" id="kendaraan" class="form-control  {{$errors->has('kendaraan') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->kendaraan->no_mesin}}" readonly>
                        </div>
                        @if ($errors->has('kendaraan'))
                        <span class="text-danger">
                            <strong id="textkendaraan">{{ $errors->first('kendaraan')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="kendaraan" class=" form-control-label">No Rangka Kendaraan</label>
                        </div>
                        <div>
                            <input type="text" name="kendaraan" placeholder="kendaraan" id="kendaraan" class="form-control  {{$errors->has('kendaraan') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->kendaraan->no_rangka}}" readonly>
                        </div>
                        @if ($errors->has('kendaraan'))
                        <span class="text-danger">
                            <strong id="textkendaraan">{{ $errors->first('kendaraan')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="tanggal" class=" form-control-label">Tanggal</label>
                        </div>
                        <div>
                            <input type="text" name="tanggal" placeholder="tanggal" id="tanggal" class="form-control  {{$errors->has('tanggal') ? 'form-control is-invalid' : 'form-control'}}" value="{{tanggal_indonesia($service->tanggal)}}" readonly>
                        </div>
                        @if ($errors->has('tanggal'))
                        <span class="text-danger">
                            <strong id="texttanggal">{{ $errors->first('tanggal')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="jenis" class=" form-control-label">Jenis Service</label>
                        </div>
                        <div>
                            <input type="text" name="jenis" placeholder="jenis" id="jenis" class="form-control  {{$errors->has('jenis') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->jenis}}" readonly>
                        </div>
                        @if ($errors->has('jenis'))
                        <span class="text-danger">
                            <strong id="textjenis">{{ $errors->first('jenis')}}</strong>
                        </span>
                        @endif
                    </div>
                    @if ($service->uraian)
                    <div class="form-group">
                        <div>
                            <label for="uraian" class=" form-control-label">uraian Service</label>
                        </div>
                        <div>
                            <input type="text" name="uraian" placeholder="uraian" id="uraian" class="form-control  {{$errors->has('uraian') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->uraian}}" readonly>
                        </div>
                        @if ($errors->has('uraian'))
                        <span class="text-danger">
                            <strong id="texturaian">{{ $errors->first('uraian')}}</strong>
                        </span>
                        @endif
                    </div>
                    @endif
                    <div class="form-group">
                        <div>
                            <label for="total_harga" class=" form-control-label">Total Harga Service</label>
                        </div>
                        <div>
                            <input type="text" name="total_harga" placeholder="total_harga" id="total_harga" class="form-control  {{$errors->has('total_harga') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->total_harga}}" readonly>
                        </div>
                        @if ($errors->has('total_harga'))
                        <span class="text-danger">
                            <strong id="texttotal_harga">{{ $errors->first('total_harga')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="total_jumlah" class=" form-control-label">Total Jumlah Sparepart</label>
                        </div>
                        <div>
                            <input type="text" name="total_jumlah" placeholder="total_jumlah" id="total_jumlah" class="form-control  {{$errors->has('total_jumlah') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->total_jumlah}}" readonly>
                        </div>
                        @if ($errors->has('total_jumlah'))
                        <span class="text-danger">
                            <strong id="texttotal_jumlah">{{ $errors->first('total_jumlah')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th>Kode Sparepart</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($service->sparepart as $index => $item)

                                <tr>
                                    <td class="text-center">{{ $index+1 }}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->pivot->jumlah}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">Data item tidak ada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('service.konfirmasi',$service->id)}}" method="POST">
                        {{ csrf_field() }}
                        @if(Auth()->user()->rule == 3 && $service->status == "hold")
                        <div class="form-group">
                            <div>
                                <label for="uraian" class=" form-control-label">Uraian</label>
                            </div>
                            <div>
                                <input type="text" name="uraian" placeholder="Masukan Uraian Service" id="uraian" class="form-control  {{$errors->has('uraian') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('uraian')}}" required>
                            </div>
                            @if ($errors->has('uraian'))
                            <span class="text-danger">
                                <strong id="texturaian">{{ $errors->first('uraian')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="status">Status</label>
                            <select name="status" class="selected2 form-control" id="cmbstatus" required>
                                <option value="">--Pilih Status--</option>
                                <option value="proses" {{old('status') == "1" ? "selected" : "" }}>Proses</option>
                                <option value="cancel" {{old('status') == "2" ? "selected" : "" }}> Cancel</option>
                            </select>
                            @if ($errors->has('status'))
                            <span class="text-danger">
                                <strong id="textstatus">{{ $errors->first('rule')}}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group ">

                            <label for="Aksi">Aksi : </label>
                            <br>
                            <span class="badge bg-success"></span>


                            <button type="submit" class="btn btn-sm btn-primary text-light">
                                <i class="nav-icon fas fa-edit"></i> Konfirmasi
                            </button>

                        </div>
                        @elseif($service->status == "proses" && Auth()->user()->rule == 2 )
                        <div class="form-group">
                            <div>
                                <label for="uraian" class=" form-control-label">Uraian</label>
                            </div>
                            <div>
                                <input type="text" name="uraian" placeholder="Masukan Uraian Service" id="uraian" class="form-control  {{$errors->has('uraian') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('uraian')}}" required>
                            </div>
                            @if ($errors->has('uraian'))
                            <span class="text-danger">
                                <strong id="texturaian">{{ $errors->first('uraian')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">

                            <label for="Aksi">Aksi : </label>
                            <br>
                            <span class="badge bg-success"></span>


                            <button type="submit" class="btn btn-sm btn-primary text-light">
                                <i class="nav-icon fas fa-edit"></i> Konfirmasi
                            </button>

                        </div>
                        @endif

                    </form>

                    @if($service->status == "cancel")
                    <div class="form-group">
                        <div>
                            <label for="uraian" class=" form-control-label">Catatan Cancel</label>
                        </div>
                        <div>
                            <input type="text" name="uraian" placeholder="uraian" id="uraian" class="form-control  {{$errors->has('uraian') ? 'form-control is-invalid' : 'form-control'}}" value="{{$service->uraian_gudang}}" readonly>
                        </div>
                        @if ($errors->has('uraian'))
                        <span class="text-danger">
                            <strong id="texturaian">{{ $errors->first('uraian')}}</strong>
                        </span>
                        @endif
                    </div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="{{route('service.index')}}" class="btn btn-primary">Kembali</a>
                    <a href="{{route('service.edit',$service->id)}}" target="_blank" class="btn btn-warning btn-sm">
                        <i class="fa fa-search"></i> Print
                    </a>
                </div>

            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->

@stop

@push('script')
<script>

</script>
@endpush