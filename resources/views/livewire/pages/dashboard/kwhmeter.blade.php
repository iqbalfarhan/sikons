<div class="page-wrapper">
    <div>
        @livewire('partial.header', [
            'title' => 'Kwh Meter',
        ])
    </div>

    <div class="flex flex-col md:flex-row gap-2">
        <select class="select select-bordered" wire:model.live="datel_id">
            <option value="">Pilih datel</option>
            @foreach ($datels as $witel => $datel)
                <optgroup label="{{ $witel }}">
                    @foreach ($datel as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        <select class="select select-bordered" wire:model.live="lokasi_id">
            <option value="">Pilih lokasi</option>
            @foreach ($lokasis as $lokasiid => $lokasiname)
                <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
            @endforeach
        </select>
    </div>

    {{-- <pre>@json($lokasis, JSON_PRETTY_PRINT)</pre> --}}

    <div class="table-wrapper">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">Datel</th>
                    <th rowspan="2">Lokasi</th>
                    <th rowspan="2">Token PLN</th>
                    <th colspan="3">Pemakaian listrik</th>
                    <th rowspan="2">Detail</th>
                </tr>
                <tr>
                    <td>Kemarin</td>
                    <td>Hari ini</td>
                    <td>Selisih</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->lokasi->datel->label }}</td>
                        <td>{{ $data->lokasi->name }}</td>
                        <td>{{ $data->nopln }}</td>
                        <td>{{ $data->yesterday ?? '-' }}</td>
                        <td>{{ $data->today ?? '-' }}</td>
                        <td>{{ $data->selisih ?? '' }}</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('kwhmeter.show', $data->id) }}"
                                    class="btn btn-xs btn-accent btn-square"
                                    wire:click="$dispatch('showKwhmeter', {token:{{ $data->id }}})">
                                    <x-tabler-folder class="icon-4" />
                                </a>
                                <a href="{{ route('token.show', $data->id) }}"
                                    class="btn btn-xs btn-square btn-primary">
                                    <x-tabler-calendar class="icon-4" />
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
