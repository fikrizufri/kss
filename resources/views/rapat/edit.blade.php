@extends('template.app')

@section('content')

<form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">

                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tanggal Rapat </label>

                                    <div>
                                        {{$data->tanggal_jam}}

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Agenda Rapat </label>

                                    <div>
                                        {{$data->agenda}}

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Pimpinan Rapat </label>

                                    <div>
                                        {{$data->pimpinan}}

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Sekretaris Rapat </label>

                                    <div>
                                        {{$data->sekretaris}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Jenis Rapat </label>

                                    <div>
                                        {{$data->jenis_rapat}}
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Tempat Rapat </label>

                                    <div>
                                        {{$data->tempat}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="card">
                            <div class="card-body">


                                <div class="form-group">
                                    <label>Sifat Rapat </label>

                                    <div>
                                        {{$data->sifat_rapat}}
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Masa Sidang </label>

                                    <div>
                                        {{$data->masa_sidang}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="col-lg-5 col-sm-5">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="jenis">Anggota Berbica</label>
                            <select name="berbicara" class="selected2 form-control" id="cmbAnggota">
                                <option value="">Pilih</option>
                                @foreach ($anggota as $index => $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                                @foreach ($data->hasPegawai as $index => $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                                @foreach ($data->hasTamu as $index => $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
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

                                    @foreach ($anggota as $index => $item)

                                    <tr id="anggota{{$item->id}}">

                                        <td>
                                            {{$item->nama}}
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm mic" onclick="speak('{{$item->nama}}')" type="button">
                                                <i class="nav-icon fa fa-microphone"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($data->hasPegawai as $index => $item)

                                    <tr id="sekretariat{{$item->id}}">
                                        <td>
                                            {{$item->nama}}
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm mic" onclick="speak('{{$item->nama}}')" type="button">
                                                <i class="nav-icon fa fa-microphone"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach ($data->hasTamu as $index => $item)

                                    <tr id="sekretariat{{$item->id}}">

                                        <td>
                                            {{$item->nama}}
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm mic" onclick="speak('{{$item->nama}}')" type="button">
                                                <i class="nav-icon fa fa-microphone"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 col-sm-7">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="hasil">Hasil Rapat</label>
                            <div class="speech">
                                <textarea name="hasil" id="hasil" rows="10" x-webkit-speech placeholder="Speak" class="form-control overflow-auto"></textarea>
                            </div>
                            <label for="hasil2">Notulen</label>
                            <div class="speech">
                                <textarea name="catatan" id="hasil2" rows="40" x-webkit-speech placeholder="Speak 2" class="form-control overflow-auto"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class=" card-footer clearfix">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </div>
</form>
@stop

@push('script')
<script>
    let content = "";
    let hasil = $('#hasil');
    let hasil2 = $('#hasil2');
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

    $(function() {
        $("#nama").keypress(function() {
            $("#nama").removeClass("is-invalid");
            $("#textNama").html("");
        });
        $("#kode").keypress(function() {
            $("#kode").removeClass("is-invalid");
            $("#textKode").html("");
        });
        $("#kota").keypress(function() {
            $("#kota").removeClass("is-invalid");
            $("#textKota").html("");
        });
        $('#cmbJenis').select2({
            placeholder: '--- Pilih Jenis---',
            width: '100%',
        });
        $('#cmbAnggota').select2({
            placeholder: '--- Pilih Anggota---',
            width: '100%',
        });

        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition || root.mozSpeechRecognition ||
            root.msSpeechRecognition ||
            root.oSpeechRecognition ||
            root.SpeechRecognition;






        // var label = navigator.mediaDevices.enumerateDevices()
        //     .then((devices) => {
        //         // devices = devices.filter((d) => d.kind === 'audioinput');
        //         return label = devices.filter((d) => d.label === 'External Microphone (Built-in)')[0];

        //     })


        // var davice = label.then((device) =>
        //     navigator.mediaDevices.getUserMedia({
        //         audio: {
        //             deviceId: "3021d311a415089929657b47b5e01e8fae8a274d2ffee475592ee23bed4ff9f4"
        //         }
        //     })
        // ).then((media) => console.log(media));




        navigator.mediaDevices.enumerateDevices({})
            .then(function(stream) {

                //ngambil semua device


                let recognition = new SpeechRecognition();
                // console.log(recognition);

                recognition.continuous = false;
                recognition.interimResults = true;
                recognition.lang = "id-ID";
                recognition.onspeechstart = function() {
                    console.log('Speech has been detected');
                }

                recognition.onspeechend = function() {
                    console.log('Speech has stopped being detected');
                    // $('#voice').html("mic off");

                }
                recognition.onend = function() {
                    // console.log("recognition ended, stream.active", stream.active);

                    recognition.start();

                }
                recognition.addEventListener('result', e => {
                    let transcript = Array.from(e.results)
                        .map(result => result[0])
                        .map(result => result.transcript).join('');


                    if (e.results[0].isFinal) {
                        var temp = hasil2.val();
                        temp = temp + " " + transcript;
                        content += transcript + " ";
                        hasil2.val(temp);
                    }
                    hasil.val(content);
                    console.log(content);
                    // hasil.val();
                });
                hasil2.on("keyup", function() {
                    content2 = this.value + " ";
                })

                recognition.start();

                //ambil waktu 



                $('#cmbAnggota').on('select2:select', function(e) {
                    var data = e.params.data.text;
                    setTimeout(function() {
                        dt = new Date();
                        time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                    }, 1000);
                    // console.log(time);
                    var temp = hasil2.val();
                    if (temp) {

                        temp = temp + "\nsedang berbicara pada pukul " + " " + "\n" + time + " \n" + data + "\n";
                        // console.log(data);
                    } else {
                        temp = "sedang berbicara pada pukul " + " " + "\n" + time + " \n" + data + "\n";
                    }
                    hasil2.val(temp);
                });
            })
            .catch(function(err) {
                console.log(err.name + ": " + err.message);
            });


    });

    function speak(person) {
        console.log(person);
        var temp = hasil2.val();
        if (temp) {

            temp = temp + "\nsedang berbicara pada pukul " + time + " \n" + person + "\n";
            // console.log(data);
        } else {
            temp = "sedang berbicara pada pukul " + time + " \n" + person + "\n";
        }
        hasil2.val(temp);
    }
</script>
@endpush