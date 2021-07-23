<html>

<head>
    <title>Service</title>
    <style>
        .left {
            float: left;
            width: 50%;
        }

        .center {
            display: inline-block;
            margin: 0 auto;
            width: 100px;
        }

        .right {
            float: right;
            width: 70%;
        }

        tr.noBorder td {
            border: 0;
        }
    </style>
</head>

<body>
    <table align="center" border="0" cellpadding="1" style="width: 700px;">
        <tbody>
            <tr>
                <td width="400px">
                    <div>

                        <img width="40%" src="{{asset('template/dist/img/logo.png')}}">
                    </div>


                </td>
                <td width="400px">
                    <div align="center">
                        <br>
                        <span style="font-family: Verdana;">
                            <b>
                                PT. ALTRAK 1978
                                <br>
                                Cabang Samarinda
                            </b>
                        </span>
                        <br>
                        Jl. Cipto Mangunkusumo No.RT. 18 Samarinda

                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="1" style="width: 400px;">
                        <tbody>
                            <tr class="noBorder">
                                <td width="400"><span>No Service</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 500"><span>{{$service->no_service }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>Nopol Kendaraan</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{ $service->kendaraan->nopol }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>No Mesin Kendaraan</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{ $service->kendaraan->no_mesin }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>No Rangka Kendaraan</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{ $service->kendaraan->no_rangka }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>Tanggal</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{tanggal_indonesia($service->tanggal) }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>Total Harga</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{ $service->total_harga }}</span></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class=" noBorder">
                                <td width="200"><span>Total Jumlah Sparepart</span></td>
                                <td width=" 8"><span>:</span></td>
                                <td width=" 200"><span>{{ $service->total_jumlah }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="302"></td>
                <td width="343"></td>
                <td width="339"></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" valign="top">
                    <div align="justify">
                        <table border="1" style="width: 700px;">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($service->sparepart as $index => $item)

                                <tr class="{{$item->stok < $item->stok_minimal ? 'table-danger' : ''}}">
                                    <td class="text-center">{{ $index+1 }}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->pivot->jumlah}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">Data item tidak ada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                    </div>
                </td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td>
                    <div align="center">
                        <span style="font-size: x-small;"></span>
                    </div>
                    <div align="center">

                    </div>
                    <div align="center">
                        <span style="font-size: x-small;"> </span>
                    </div>
                </td>
                <td></td>
                <td valign="top">
                    <div align="center">
                        <span style="font-size: x-small;">Samarinda, {{tanggal_indonesia($now)}} </span>
                        <br>
                        <span style="font-size: x-small;">Tertanda </span>
                    </div>
                    <div align="center">

                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div align="center">
                        <span style="font-size: x-small;"> {{Auth()->user()->name}}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        myFunction();

        function myFunction() {
            window.print();
        }
        window.onafterprint = function() {
            window.close();
        }
    </script>
</body>

</html>