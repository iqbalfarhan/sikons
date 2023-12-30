<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Download laporan sikons'])

    <div class="table-wrapper">
        <table class="table table-xs">
            <thead>
                <th>No</th>
                <th>tanggal</th>
                <th>waktu</th>
                <th>witel</th>
                <th>datel</th>
                <th>lokasi jaga</th>
                <th>petugas</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->waktu }}</td>
                        <td>{{ $data->lokasi->datel->witel }}</td>
                        <td>{{ $data->lokasi->datel->name }}</td>
                        <td>{{ $data->lokasi->name }}</td>
                        <td>{{ $data->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
