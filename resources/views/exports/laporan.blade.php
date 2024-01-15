<table>
    <tr>
        <td>id</td>
        <td>witel</td>
        <td>datel</td>
        <td>lokasi</td>
        <td>petugas</td>
        <td>tanggal</td>
        <td>waktu</td>
        <td>lingkungan</td>
        <td>bbm</td>
        <td>apar</td>
        <td>apd</td>
        <td>perangkat</td>
        <td>cuaca</td>
        <td>pln</td>
        <td>genset</td>
        <td>gedung</td>
    </tr>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->lokasi->datel->witel }}</td>
                <td>{{ $data->lokasi->datel->name }}</td>
                <td>{{ $data->lokasi->name }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->tanggal->format('Y-m-d') }}</td>
                <td>{{ $data->waktu }}</td>
                <td>{{ $data->lingkungan }}</td>
                <td>{{ $data->bbm }}</td>
                <td>{{ $data->apar }}</td>
                <td>{{ $data->apd }}</td>
                <td>{{ $data->perangkat }}</td>
                <td>{{ $data->cuaca }}</td>
                <td>{{ $data->pln }}</td>
                <td>{{ $data->genset }}</td>
                <td>{{ $data->gedung }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
