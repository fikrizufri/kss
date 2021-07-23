<html>

<head>
    <title>laporan {{$title}}</title>
    <style>
        .left {
            float: left;
            width: 50%;
        }

        .center {
            display: inline-block;
            margin: 0 auto;
        }

        .right {
            float: right;
            width: 70%;
        }

        tr td {
            border: 1;
        }
    </style>
</head>

<body>
    <table align="center" cellpadding="1" style="width: 700px;">
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
                    <div>
                        <table width="100%" border="1">
                            <thead>
                                <tr>
                                    <td><span style="font-size: 9pt;"><b> No </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> No Service </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> Nopol </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> No Mesin </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> No Rangka </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> Tanggal </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> Sparepart </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> Total Sparepart </b></span></td>
                                    <td><span style="font-size: 9pt;"><b> Harga </b></span></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataService as $index => $item)

                                <tr>

                                    <td><span style="font-size: 9pt;">{{$index+1}}</span></td>
                                    <td><span style="font-size: 9pt;">{{$item->no_service}}</span></td>
                                    <td><span style="font-size: 9pt;">{{$item->kendaraan->nopol}}</span></td>
                                    <td><span style="font-size: 9pt;">{{$item->kendaraan->no_mesin}}</span></td>
                                    <td><span style="font-size: 9pt;">{{$item->kendaraan->no_rangka}}</span></td>
                                    <td><span style="font-size: 9pt;">{{tanggal_indonesia($item->tanggal)}}</span></td>

                                    <td><span style="font-size: 9pt;">
                                            @forelse($item->sparepart as $value)
                                            {{ $loop->first ? '' : ', ' }}
                                            {{$value->nama}} : jumlah {{ $value->pivot->jumlah}}
                                            @empty
                                            @endforelse
                                        </span>
                                    </td>
                                    <td><span style="font-size: 9pt;">{{$item->total_jumlah}}</span></td>
                                    <td><span style="font-size: 9pt;">{{$item->total_harga}}</span></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">Data {{$title}} tidak ada</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"> </td>
                                    <td><span id="totalItem" style="font-size: 9pt;"> Total</span></td>
                                    <td><span id="totalItem" style="font-size: 9pt;">{{$jumlah}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="7"> </td>
                                    <td><span id="totalItem" style="font-size: 9pt;"> Total Harga</span></td>
                                    <td><span id="totalItem" style="font-size: 9pt;">{{$sumSrvice}}</span></td>
                                </tr>
                            </tfoot>
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
                        <span style="font-size: x-small;">Mengetahui, </span>
                    </div>
                    <div align="center">

                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div align="center">
                        <span style="font-size: x-small;"> {{$nama_user}}</span>
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