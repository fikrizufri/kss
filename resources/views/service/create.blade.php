@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="no_service" class=" form-control-label">No Service</label>
                            </div>
                            <div>
                                <input type="text" name="no_service" placeholder="no_service" id="no_service" class="form-control  {{$errors->has('no_service') ? 'form-control is-invalid' : 'form-control'}}" value="{{$noService}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="tanggal" class=" form-control-label">Tanggal</label>
                            </div>
                            <div>
                                <input type="text" name="tanggaltampil" placeholder="tanggal" id="tanggaltampil" class="form-control  {{$errors->has('tanggaltampil') ? 'form-control is-invalid' : 'form-control'}}" value="{{tanggal_indonesia($now)}}" readonly>
                                <input type="text" name="tanggal" placeholder="tanggal" id="tanggal" class="form-control  {{$errors->has('tanggal') ? 'form-control is-invalid' : 'form-control'}}" value="{{$now}}" hidden>
                            </div>
                            @if ($errors->has('tanggal'))
                            <span class="text-danger">
                                <strong id="texttanggal">{{ $errors->first('tanggal')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="kendaraan">Kendaraan</label>
                            <select name="kendaraan" class="selected2 form-control" id="cmbkendaraan" required>
                                <option value="">Pilih</option>
                                @foreach ($dataKendaraan as $key => $item)
                                <option value="{{$item->id}}">{{$item->nopol}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kendaraan'))
                            <span class="text-danger">
                                <strong id="textkendaraan">{{ $errors->first('kendaraan')}}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="jenis" class=" form-control-label">Jenis Service</label>
                            </div>
                            <div>
                                <input type="text" name="jenis" placeholder="Masukan Jenis Service" id="jenis" class="form-control  {{$errors->has('jenis') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('jenis')}}">
                            </div>
                            @if ($errors->has('jenis'))
                            <span class="text-danger">
                                <strong id="textjenis">{{ $errors->first('jenis')}}</strong>
                            </span>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Item</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">


                        <div class="form-group ">
                            <label for="sparepart">Sparepart</label>
                            <select name="sparepart" class="selected2 form-control" id="cmbsparepart" required>
                                <option value="">Pilih</option>
                                @foreach ($dataSparepart as $key => $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('sparepart'))
                            <span class="text-danger">
                                <strong id="textsparepart">{{ $errors->first('sparepart')}}</strong>
                            </span>
                            @endif
                        </div>
                        <table class="table table-bordered table-responsive" id="detailItem">
                            <thead>
                                <tr>
                                    <th width="5"></th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr id="listNothing">
                                    <td colspan="6">Daftar Sparepart tidak ada</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer clearfix ">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </form>
</div><!-- /.container-fluid -->

@stop

@push('script')
<script>
    $(function() {

        $('#cmbkendaraan').select2({
            placeholder: '--- Pilih Kendaraan---',
            width: '100%',
        });
        $('#cmbsparepart').select2({
            placeholder: '--- Pilih Sparepart---',
            width: '100%',
        });
        $('#detailItem').on('click', '.delete', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            var rows = $('#detailItem tbody tr').length;
            if (rows == 1) {
                $('.delete').hide();
            }
        });

        $("#cmbsparepart").on('select2:select', function(e) {
            // var selected = [];
            // selected = $(e.currentTarget).val();
            var selected = e.params.data;
            // $('#cmbitem').val([]);
            var _token = $("input[name='_token']").val();
            var jumlahitem = $("#jumlahitem").val();
            var item = selected.id;

            console.log(item);
            var content = '';

            $.ajax({
                type: 'get',
                url: "{{route('detailsparepart')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: item,
                    jumlah: jumlahitem
                },
                success: function(data) {

                    var value = data.sparepart;
                    console.log(value);
                    var jumlah = 0;
                    // console.log(data.item);
                    if ($('#item' + value.id).length > 0) {
                        var jumexis = parseInt($('#jumlah' + value.id).val());
                        console.log(jumexis);
                        var hasil = parseInt(jumexis += 1);
                        $('#jumlah' + value.id).val(hasil);

                    } else {

                        content += `<tr id="item${value.id}">`;
                        content += `<td class="text-center" class="colDelete"><button type="button" class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td>`
                        content += `
                            <td>${value.kode} <input type="text" name="item[${value.id}]" hidden value="${value.id}"></td>
                            <td>${value.nama}</td>
                            <td width="150">
                            <input type="number" name="harga[${value.id}]"  min="1" max="999999" placeholder="harga" id="harga${value.id}" value="${value.harga}" readonly>
                            </td>
                            <td width="150"><input type="number" name="jumlah[${value.id}]"  min="1" max="999999" placeholder="jumlah" id="jumlah${value.id}" class="form-control  {{$errors->has('jumlah') ? 'form-control is-invalid' : 'form-control'}}" value="${jumlah += 1}"></td>
                        `;

                        content += `</tr>`;
                        $('#detailItem tbody').append(content);
                        $("#listNothing").hide();
                    }
                },
                error: function() {
                    alert("maaf stok habis");
                }
            });
        });
    });
</script>
@endpush