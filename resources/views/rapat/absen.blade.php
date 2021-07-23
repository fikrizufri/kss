@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Anggota DPRD</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="col-lg-12">
                            <label for="anggota">Pilih Anggota </label>
                            <div class="input-group">
                                <select name="anggota" class="selected2 custom-select" id="cmbAnggota">
                                    <option value="">--Pilih Anggota--</option>
                                    @foreach ($allAnggota as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12 ">
                            <table class="table table-head-fixed table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jabatan</th>

                                        <th class="text-center" width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="detailItem">

                                    @forelse ($anggota as $index => $item)

                                    <tr id="anggota{{$item->id}}">

                                        <td>
                                            {{$item->nama}}
                                            <input type="hidden" name="anggota[]" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm deleteAnggota" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @empty
                                    <tr id="empty">
                                        <td colspan="10">Data Anggota tidak ada</td>
                                    </tr>
                                    @endforelse
                                    <tr id="empty" style="display: none">
                                        <td colspan="10">Data Anggota tidak ada</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Sekretariat DRPD </h4>

                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <label for="Sekretariat">Pilih Sekretariat </label>
                            <div class="input-group">
                                <select name="sekretariat" class="selected2 custom-select" id="cmbSekretariat">
                                    <option value="">--Pilih Sekretariat--</option>
                                    @foreach ($allSekretariat as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <table class="table table-bordered" id="detailSekretariat">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->hasPegawai)
                                    @forelse ($data->hasPegawai as $index => $item)

                                    <tr id="sekretariat{{$item->id}}">


                                        <td>
                                            {{$item->nip}}
                                        </td>
                                        <td>
                                            {{$item->nama}}
                                            <input type="hidden" name="sekretariat[]" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm deleteSekretariat" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr id="listNothing" style="display: none">
                                        <td colspan="4">Daftar Sekretariat tidak ada</td>
                                    </tr>
                                    @empty
                                    <tr id="listNothing">
                                        <td colspan="4">Daftar Sekretariat tidak ada</td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr id="listNothing">
                                        <td colspan="4">Daftar Sekretariat tidak ada</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- </form> -->
                </div>
                <!-- ./col -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Tamu</h4>
                    </div>
                    <div class="card-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <label for="text" class=" form-control-label">Nama</label>
                                    </div>
                                    <div>
                                        <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control" value="{{old('nama')}}">
                                    </div>

                                    <span class="text-danger">
                                        <strong id="textNama"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <label for="text" class=" form-control-label">Jabatan</label>
                                    </div>
                                    <div>
                                        <input type="text" name="jabatan" placeholder="Jabatan" id="jabatan" class="form-control" value="{{old('jabatan')}}">
                                    </div>
                                    <span class="text-danger">
                                        <strong id="textJabatan"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <label for="text" class=" form-control-label">Instansi</label>
                                    </div>
                                    <div>
                                        <input type="text" name="instansi" placeholder="Instansi" id="instansi" class="form-control" value="{{old('instansi')}}">
                                    </div>
                                    <span class="text-danger">
                                        <strong id="textInstansi"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="text" class=" form-control-label">Aksi</label>
                                </div>
                                <div class="clearfix">
                                    <button type="button" id="CreateTamu" class="btn btn-primary btn-sm">Create</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <table class="table table-bordered" id="detailTamu">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Instansi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->hasTamu)
                                    @forelse ($data->hasTamu as $index => $item)

                                    <tr id="sekretariat{{$item->id}}">

                                        <td>
                                            {{$item->nama}}
                                            <input type="hidden" name="sekretariat[]" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td>
                                            {{$item->instansi}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm deleteTamu" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @empty
                                    <tr id="listNothingTamu">
                                        <td colspan="4">Daftar Tamu tidak ada</td>
                                    </tr>
                                    @endforelse

                                    @else
                                    <tr id="listNothingTamu">
                                        <td colspan="4">Daftar Tamu tidak ada</td>
                                    </tr>
                                    @endif
                                    <tr id="listNothingTamu" style="display: none">
                                        <td colspan="4">Daftar Tamu tidak ada</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- </form> -->
                </div>
                <!-- ./col -->
            </div>
            <div class="col-12">
                <div class="card">

                    <div class=" card-footer clearfix">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
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
        $('#detailItem').on('click', '.deleteAnggota', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            var rows = $('#detailItem tr').length;

            if (rows == 1) {
                $('#empty').show();
            }
        });
        $('#detailSekretariat').on('click', '.deleteSekretariat', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            var rows = $('#detailSekretariat tbody tr').length;
            console.log(rows);
            if (rows == 1) {
                // $('.delete').hide();
                $('#listNothing').show();
            }
        });
        $('#detailTamu').on('click', '.deleteTamu', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            var rows = $('#detailTamu tbody tr').length;
            console.log(rows);
            if (rows == 1) {
                $('#listNothingTamu').show();

            }
        });
        $('#cmbAnggota').select2({
            placeholder: '--- Pilih Anggota---',
            width: '100%',
        }).on('select2:close', function() {
            var content = '';
            if (!$('#anggota' + this.value).length > 0) {
                let id = this.value;
                $.ajax({
                    type: 'get',
                    url: "{{route('anggota.detail')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        console.log(data);
                        var value = data.anggota;
                        content += `<tr id="anggota${id}">`;
                        content += `<td>${value.nama}
                                <input type="hidden" name="anggota[]" value="${id}"/></td>`;
                        content += `<td>${value.jabatan}</td>`;
                        content += `<td class="text-center"> <button class="btn btn-danger btn-sm deleteAnggota" type="button"><i class="fa fa-trash"></i> </button></td>`
                        content += `</tr>`;
                        $('#detailItem').append(content);
                        $('#empty').hide();
                    },
                    error: function() {
                        alert("anggota tidak ada");
                    }
                });
            }
        });
        $('#cmbSekretariat').select2({
            placeholder: '--- Pilih Sekretariat---',
            width: '100%',
        }).on('select2:close', function() {
            var content = '';
            if (!$('#sekretariat' + this.value).length > 0) {
                let id = this.value;
                $.ajax({
                    type: 'get',
                    url: "{{route('pegawai.detail')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        console.log(data);
                        var value = data.pegawai;
                        content += `<tr id="sekretariat${id}">`;
                        content += `<td>${value.nip}
                                <input type="hidden" name="sekretariat[]" value="${id}"/></td>`;
                        content += `<td>${value.nama}</td>`;
                        content += `<td>${value.jabatan}</td>`;
                        content += `<td class="text-center"> <button class="btn btn-danger btn-sm deleteSekretariat" type="button"><i class="fa fa-trash"></i> </button></td>`
                        content += `</tr>`;
                        $('#detailSekretariat').append(content);
                        $('#listNothing').hide();
                    },
                    error: function() {
                        alert("Sekretariat tidak ada");
                    }
                });
            }
        });

        $('#CreateTamu').click(function() {
            if ($("#nama").val() == "") {
                $("#nama").addClass("is-invalid");
                $("#textNama").html("Nama can not be empty");
            }
            if ($("#jabatan").val() == "") {
                $("#jabatan").addClass("is-invalid");
                $("#textJabatan").html("Jabatan can not be empty");
            }
            if ($("#instansi").val() == "") {
                $("#instansi").addClass("is-invalid");
                $("#textInstansi").html("instansi can not be empty");
            }
            var contentTamu = '';
            if ($("#nama").val() != "" && $("#jabatan").val() != "" && $("#instansi").val() != "") {
                console.log("kirim")
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{route('tamu.store')}}",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        _token: "{{ csrf_token() }}",
                        nama: $("#nama").val(),
                        jabatan: $("#jabatan").val(),
                        instansi: $("#instansi").val(),
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function(data) {
                        console.log(data);
                        var value = data.tamu;
                        if (!$('#tamu' + value.id).length > 0) {

                            $("#nama").val('');
                            $("#textNama").html("");
                            $("#jabatan").val('');
                            $("#textJabatan").html("");
                            $("#instansi").val('');
                            $("#textInstansi").html("");

                            contentTamu += `<tr id="tamu${value.id}">`;
                            contentTamu += `<td>${value.nama}  <input type="hidden" name="tamu[]" value="${value.id}"></td>`;
                            contentTamu += `<td>${value.jabatan}</td>`;
                            contentTamu += `<td>${value.instansi}</td>`;
                            contentTamu += `<td class="text-center"> <button class="btn btn-danger btn-sm deleteTamu" type="button"><i class="fa fa-trash"></i> </button></td>`
                            contentTamu += `</tr>`;
                            console.log(value);
                            console.log(contentTamu);
                            $('#detailTamu').append(contentTamu);
                            $('#listNothingTamu').hide();
                        }
                    }
                });
            }
        });
        $("#nama").keypress(function() {
            $("#nama").removeClass("is-invalid");
            $("#textNama").html("");
        });
        $("#jabatan").keypress(function() {
            $("#jabatan").removeClass("is-invalid");
            $("#textJabatan").html("");
        });
        $("#instansi").keypress(function() {
            $("#instansi").removeClass("is-invalid");
            $("#textInstansi").html("");
        });
    });
</script>
@endpush