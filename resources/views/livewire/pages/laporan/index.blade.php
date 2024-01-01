<div class="page-wrapper">
    @livewire('partial.header')

    <div class="grid lg:grid-cols-3 gap-6">
        @forelse ($datas as $data)
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent')
            </div>
        @endforelse
    </div>
</div>
