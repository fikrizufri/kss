@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah {{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">

                        <div class="form-group">
                            <div>
                                <label for="nik" class=" form-control-label">Nik {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nik" placeholder="Nik {{$title}}" id="nik" class="form-control  {{$errors->has('nik') ? 'form-control is-invalid' : 'form-control'}}" value="{{$karyawan->nik}}" required>
                            </div>
                            @if ($errors->has('nik'))
                            <span class="text-danger">
                                <strong id="textnik">{{ $errors->first('nik')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" placeholder="Nama {{$title}}" id="nama" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{$karyawan->nama}}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textnama">{{ $errors->first('nik')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="departemen">Departemen</label>
                            <select name="departemen" class="selected2 form-control" id="cmbdepartemen">
                                <option value="">--Pilih Departemen--</option>
                                @foreach ($dataDepartemen as $departemen)
                                <option value="{{$departemen->id}}" {{$karyawan->departemen_id == $departemen->id ? "selected" : ""}}>{{$departemen->nama}} - {{$departemen->kota}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('departemen'))
                            <span class="text-danger">
                                <strong id="textcmbdepartemen">{{ $errors->first('departemen')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="rule">Jabatan</label>
                            <select name="rule" class="selected2 form-control" id="cmbrule" required>
                                <option value="">--Pilih Hak Jabatan--</option>
                                <option value="1" {{$karyawan->user->rule == "1" ? "selected" : "" }}>Admin</option>
                                <option value="2" {{$karyawan->user->rule == "2" ? "selected" : "" }}> Mekanik</option>
                                <option value="3" {{$karyawan->user->rule == "3" ? "selected" : "" }}> Gudang</option>
                            </select>
                            @if ($errors->has('rule'))
                            <span class="text-danger">
                                <strong id="textrule">{{ $errors->first('rule')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
        $(function() {
            $("#nik").keypress(function() {
                $("#nik").removeClass("is-invalid");
                $("#textnik").html("");
            });
            $("#nama").keypress(function() {
                $("#nama").removeClass("is-invalid");
                $("#textnama").html("");
            });
            $('#cmbdepartemen').select2({
                placeholder: '--- Pilih departemen---',
                width: '100%'
            });
        });
    </script>
    @endpush