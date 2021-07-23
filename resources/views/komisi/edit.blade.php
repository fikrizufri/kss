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
                <form action="{{ route($route.'.update', $data->id) }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" id="nama" placeholder="Nama {{$title}}" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $data->nama }}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="bidang" class=" form-control-label">{{ucfirst('bidang')}} {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="bidang" id="bidang" placeholder="{{ucfirst('bidang')}} {{$title}}" class="form-control  {{$errors->has('bidang') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $data->bidang }}" required>
                            </div>
                            @if ($errors->has('bidang'))
                            <span class="text-danger">
                                <strong id="textbidang">{{ $errors->first('bidang')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="keterangan" class=" form-control-label">{{ucfirst('keterangan')}} {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="keterangan" id="keterangan" placeholder="{{ucfirst('keterangan')}} {{$title}}" class="form-control  {{$errors->has('keterangan') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $data->keterangan }}" required>
                            </div>
                            @if ($errors->has('keterangan'))
                            <span class="text-danger">
                                <strong id="textketerangan">{{ $errors->first('keterangan')}}</strong>
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
            $("#nama").keypress(function() {
                $("#nama").removeClass("is-invalid");
                $("#textNama").html("");
            });
            $("#bidang").keypress(function() {
                $("#bidang").removeClass("is-invalid");
                $("#textbidang").html("");
            });
            $("#keterangan").keypress(function() {
                $("#keterangan").removeClass("is-invalid");
                $("#textketerangan").html("");
            });
        });
    </script>
    @endpush