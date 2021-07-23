<h3>NOTULEN RAPAT DPRD KOTA SAMARINDA</h3>

<table>
    <thead>
        <tr></tr>
        <tr>
            <th width="20"><b>Agenda Rapat</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->agenda}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Hari/Tanggal</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->tanggal_jam}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Tempat</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->tempat}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Pimpinan Rapat</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->pimpinan}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Seketaris Rapat</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->pimpinan}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Masa Sidang</b></th>
            <th width="1"><b>:</b></th>
            <th><b>{{$data->masa_sidang}}</b></th>
        </tr>
        <tr>
            <th width="20"><b>Peserta Rapat</b></th>
            <th width="1"><b>:</b></th>
            <th><b>Terlampir</b></th>
        </tr>
    </thead>
    <tbody>
        <tr></tr>
        <tr></tr>
        <tr>
            <td colspan="3">
                <h3>Hasil Notulen</h3>
            </td>
        </tr>

        <tr>
            <td colspan="9" rowspan="80" style="word-wrap: break-word;text-align:left;vertical-align:top;padding:0">
                <!-- {!!$data->catatan!!} -->
                {!!nl2br($data->catatan)!!}
            </td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>