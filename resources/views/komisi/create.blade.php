@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route($route.'.store') }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{ucfirst($route)}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" placeholder="Nama {{ucfirst($route)}}" id="nama" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nama')}}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="bidang" class=" form-control-label">{{ucfirst('bidang')}} {{ucfirst($route)}}</label>
                            </div>
                            <div>
                                <input type="text" name="bidang" placeholder="{{ucfirst('bidang')}} {{ucfirst($route)}}" id="bidang" class="form-control  {{$errors->has('bidang') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('bidang')}}" required>
                            </div>
                            @if ($errors->has('bidang'))
                            <span class="text-danger">
                                <strong id="textbidang">{{ $errors->first('bidang')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="keterangan" class=" form-control-label">{{ucfirst('keterangan')}} {{ucfirst($route)}}</label>
                            </div>
                            <div>
                                <input type="text" name="keterangan" placeholder="{{ucfirst('keterangan')}} {{ucfirst($route)}}" id="keterangan" class="form-control  {{$errors->has('keterangan') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('keterangan')}}" required>
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