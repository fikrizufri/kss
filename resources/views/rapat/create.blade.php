@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nomor" class=" form-control-label">Nomor {{ucfirst($route)}}</label>
                            </div>
                            <div>
                                <input type="text" name="nomor" placeholder="Nomor {{ucfirst($route)}}" id="nomor" class="form-control  {{$errors->has('nomor') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nomor')}}" required>
                            </div>
                            @if ($errors->has('nomor'))
                            <span class="text-danger">
                                <strong id="textNomor">{{ $errors->first('nomor')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tanggal Rapat </label>

                            <div class='input-group'>

                                <input type="date" name="tanggal" placeholder="tanggal {{ucfirst($route)}}" id="tanggal" class="form-control  {{$errors->has('tanggal') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('tanggal')}}" required>

                                <input type="time" name="tanggal" placeholder="tanggal {{ucfirst($route)}}" id="tanggal" class="form-control  {{$errors->has('tanggal') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('tanggal')}}" required>
                            </div>
                            <!-- /.input group -->
                            @if ($errors->has('tanggal'))
                            <span class="text-danger">
                                <strong id="texttanggal">{{ $errors->first('tanggal')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="rapat" class=" form-control-label">Rapat Ke</label>
                            </div>
                            <div>
                                <input type="text" name="rapat" placeholder="" id="rapat" class="form-control  {{$errors->has('rapat') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('rapat')}}" required>
                            </div>
                            @if ($errors->has('rapat'))
                            <span class="text-danger">
                                <strong id="textrapat">{{ $errors->first('rapat')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="pembasaan" class=" form-control-label">Pembasaan Rapat</label>
                            </div>
                            <div>
                                <input type="text" name="pembasaan" placeholder="" id="pembasaan" class="form-control  {{$errors->has('pembasaan') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('pembasaan')}}" required>
                            </div>
                            @if ($errors->has('pembasaan'))
                            <span class="text-danger">
                                <strong id="textpembasaan">{{ $errors->first('pembasaan')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="masa" class=" form-control-label">Masa Sidang</label>
                            </div>
                            <div>
                                <input type="text" name="masa" placeholder="" id="masa" class="form-control  {{$errors->has('masa') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('masa')}}" required>
                            </div>
                            @if ($errors->has('masa'))
                            <span class="text-danger">
                                <strong id="textmasa">{{ $errors->first('masa')}}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <!-- /.card-header -->
                    <!-- <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }} -->
                    <div class="card-body">

                        <div class="form-group">
                            <label for="pimpinan">Pimpinan Rapat</label>
                            <select name="pimpinan" class="selected2 form-control" id="cmbPimpinan" required>
                                <option value="">Pilih</option>
                                @foreach($dataAnggota as $anggota)
                                <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('pimpinan'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('pimpinan')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="seketaris">Seketaris Rapat</label>
                            <select name="seketaris" class="selected2 form-control" id="cmbSeketaris" required>
                                <option value="">Pilih</option>
                                @foreach($dataAnggota as $anggota)
                                <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('seketaris'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('seketaris')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Rapat</label>
                            <select name="jenis" class="selected2 form-control" id="cmbJenis" required>
                                <option value="">Pilih</option>
                                <option value="1">Rapat Komisi</option>
                                <option value="2">Rapat Pimpinan</option>
                                <option value="3">Rapat Paripurna</option>
                            </select>
                            @if ($errors->has('jenis'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('jenis')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sifat">Sifat Rapat</label>
                            <select name="sifat" class="selected2 form-control" id="cmbSifat" required>
                                <option value="">Pilih</option>
                                <option value="1">Terbuka</option>
                                <option value="2">Tertutup</option>
                                <option value="3">Umum</option>
                            </select>
                            @if ($errors->has('sifat'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('sifat')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="anggota">Anggota Rapat</label>
                            <select name="anggota[]" multiple="multiple" class="selected2 form-control" id="cmbAnggota" required>
                                <option value="">Pilih</option>
                                @foreach($dataAnggota as $anggota)
                                <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('anggota'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('anggota')}}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- </form> -->
                </div>
                <!-- ./col -->
            </div>
            <div class="col-12">
                <div class=" card-footer clearfix">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </form>
</div><!-- /.container-fluid -->

@stop

@push('style')

@endpush
@push('script')

<script>
    $(function() {
        $("#nama").keypress(function() {
            $("#nama").removeClass("is-invalid");
            $("#textNama").html("");
        });
        $("#nomor").keypress(function() {
            $("#nomor").removeClass("is-invalid");
            $("#textNomor").html("");
        });
        $('#cmbJenis').select2({
            placeholder: '--- Pilih Jenis---',
            width: '100%',
        });
        $('#cmbPimpinan').select2({
            placeholder: '--- Pilih Pimpinan---',
            width: '100%',
        });
        $('#cmbSeketaris').select2({
            placeholder: '--- Pilih Seketaris---',
            width: '100%',
        });
        $('#cmbAnggota').select2({
            placeholder: '--- Pilih Anggota---',
            width: '100%',
        });
        $('#cmbSifat').select2({
            placeholder: '--- Pilih Sifat---',
            width: '100%',
        });
    });
</script>
@endpush