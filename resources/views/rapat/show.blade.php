@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Tanggal Rapat </label>

                        <div>
                            {{$data->tanggal_jam}}

                        </div>

                    </div>
                    <div class="form-group">
                        <div>
                            <label for="rapat" class=" form-control-label">Agenda Rapat</label>
                        </div>
                        <div>
                            {{$data->agenda}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="masa" class=" form-control-label">Pimpinan Rapat</label>
                        </div>
                        <div>
                            {{$data->pimpinan}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="masa" class=" form-control-label">Seketaris Rapat</label>
                        </div>
                        <div>
                            {{$data->sekretaris}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="masa" class=" form-control-label">Tempat</label>
                        </div>
                        <div>
                            {{$data->tempat}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="masa" class=" form-control-label">Masa Sidang</label>
                        </div>
                        <div>
                            {{$data->masa_sidang}}
                        </div>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="pimpinan">Anggota</label>

                        <div>

                            @forelse($data->hasAnggota as $value)
                            {{ $loop->first ? '' : ', ' }}
                            {{$value->nama}}
                            @empty
                            @endforelse

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seketaris">Staf Seketaris DPRD</label>

                        <div>
                            @forelse($data->hasPegawai as $value)
                            {{ $loop->first ? '' : ', ' }}
                            {{$value->nama}}
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="seketaris">Tamu</label>

                        <div>
                            @forelse($data->hasTamu as $value)
                            {{ $loop->first ? '' : ', ' }}
                            {{$value->nama}}
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasil">Hasil Rapat</label>
                        <div class="speech">
                            {!!nl2br($data->hasil)!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasil">Hasil Notulen</label>
                        <div class="speech">
                            {!!nl2br($data->catatan)!!}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
            <!-- ./col -->
        </div>
        <div class="col-12">
            <div class=" card-footer clearfix">
                <!-- <button type="button" class="btn btn-primary"> <span class="nav-icon fa fa-file-word" aria-hidden="true"></span> Export Word</button> -->
                <a href="{{route('rapat.excel')}}?id={{$data->id}}" class="btn btn-success"><span class="nav-icon fa fa-file-excel" aria-hidden="true"></span> Export Notulen</a>
                <a href="{{route('absen.excel')}}?id={{$data->id}}" class="btn btn-primary"><span class="nav-icon fa fa-file-excel" aria-hidden="true"></span> Export Absen</a>
                <form id="form-{{$data->id}}" action="{{ route($route.'.destroy', $data->id)}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                </form>
                <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick=deleteconf("{{$data->id}}")>
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</div>
@stop

@push('script')
<script>
    $(function() {

    });
</script>
@endpush