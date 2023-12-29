<div class="page-wrapper">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($datas as $data)
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        @endforeach
    </div>
</div>
