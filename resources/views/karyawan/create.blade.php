@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create {{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nik" class=" form-control-label">Nik {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nik" placeholder="Nik {{$title}}" id="nik" class="form-control  {{$errors->has('nik') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nik')}}" required>
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
                                <input type="text" name="nama" placeholder="Nama {{$title}}" id="nama" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nama')}}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textnama">{{ $errors->first('nik')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="departemen">Departemen</label>
                            <select name="departemen" class="selected2 form-control" id="cmbDepartemen">
                                <option value="">--Pilih Departemen--</option>
                                @foreach ($dataDepartemen as $Departemen)
                                <option value="{{$Departemen->id}}" {{old('departemen') == $Departemen->id ? "selected" : ""}}>{{$Departemen->nama}} {{$Departemen->kota}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('Departemen'))
                            <span class="text-danger">
                                <strong id="textsatuan">{{ $errors->first('satuan')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="rule">Jabatan</label>
                            <select name="rule" class="selected2 form-control" id="cmbrule" required>
                                <option value="">--Pilih Jabatan--</option>
                                <option value="1" {{old('rule') == "1" ? "selected" : "" }}>Admin</option>
                                <option value="2" {{old('rule') == "2" ? "selected" : "" }}> Mekanik</option>
                                <option value="3" {{old('rule') == "3" ? "selected" : "" }}> Gudang</option>
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
                        <button type="submit" class="btn btn-primary">Save</button>
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

            $('#cmbDepartemen').select2({
                placeholder: '--- Pilih Departemen---',
                width: '100%'
            });
        });
    </script>
    @endpush