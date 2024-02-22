<div class="page-wrapper w-full max-w-full">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Chart penggunaan listrik',
        ])

        <button class="btn btn-primary" wire:click="randomize" wire:loading.attr="disabled">
            <x-tabler-refresh class="icon-5" wire:loading.class="animate-spin" />
            <span>Generate</span>
        </button>
    </div>

    <div class="card border">
        <div class="card-body space-y-6">
            <div class="h-96">
                <livewire:livewire-line-chart key="{{ $lineChartModel->reactiveKey() }}" :line-chart-model="$lineChartModel" />
            </div>
        </div>
    </div>

    {{-- <pre>@json($kwhmeters, JSON_PRETTY_PRINT)</pre> --}}
</div>
