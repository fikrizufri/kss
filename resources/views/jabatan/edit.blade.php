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
                <form action="{{ route($route.'.update', $badan->id) }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" id="nama" placeholder="Nama {{$title}}" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $badan->nama }}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="keterangan" class=" form-control-label">Keterangan {{ucfirst($route)}}</label>
                            </div>
                            <div>
                                <input type="text" name="keterangan" placeholder="Keterangan {{ucfirst($route)}}" id="keterangan" class="form-control  {{$errors->has('keterangan') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $badan->keterangan }}" required>
                            </div>
                            @if ($errors->has('keterangan'))
                            <span class="text-danger">
                                <strong id="textketerangan">{{ $errors->first('name')}}</strong>
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
            $("#keterangan").keypress(function() {
                $("#keterangan").removeClass("is-invalid");
                $("#textketerangan").html("");
            });

        });
    </script>
    @endpush