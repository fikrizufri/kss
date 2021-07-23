<h3>DAFTAR HADIR RAPAT </h3>

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
    </thead>

</table>
<table style="border: 3px solid black;">
    <thead>
        <tr>
            <th width="20" style="border: 3px solid black;" colspan="3"><b>Nama</b></th>
            <th width="30" style="border: 3px solid black;"><b>Jabatan</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data->hasPegawai as $index => $item)

        <tr>
            <td style="border: 3px solid black;" colspan="3">{{$item->nama}} </td>
            <td style="border: 3px solid black;">{{$item->jabatan}}</td>
        </tr>
        @empty
        @endforelse
        @forelse ($data->hasAnggota as $index => $item)

        <tr>
            <td style="border: 3px solid black;" colspan="3">{{$item->nama}} </td>
            <td style="border: 3px solid black;">{{$item->jabatan}}</td>
        </tr>
        @empty
        @endforelse

    </tbody>

    <tfoot>

    </tfoot>
</table>

<h3>DAFTAR HADIR TAMU </h3>
<table style="border: 3px solid black;">
    <thead>
        <tr>
            <th width="20" style="border: 3px solid black;" colspan="3"><b>Nama</b></th>
            <th width="30" style="border: 3px solid black;"><b>Instansi</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data->hasTamu as $index => $item)

        <tr>
            <td style="border: 3px solid black;" colspan="3">{{$item->nama}} </td>
            <td style="border: 3px solid black;">{{$item->jabatan}}, {{$item->instansi}}</td>
        </tr>
        @empty
        @endforelse

    </tbody>

    <tfoot>

    </tfoot>
</table>