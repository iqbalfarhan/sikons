<div class="page-wrapper max-w-7xl">

    <div class="flex justify-between">
        @livewire('partial.header')
        <input type="month" wire:model.live='tanggal' class="input input-bordered">
    </div>

    <div class="table-wrapper">
        <table class="table">
            <table class="table">
                <tr>
                    @foreach ($dayNames as $name)
                        <th>{{ $name }}</th>
                    @endforeach
                </tr>
                @foreach (array_chunk($daysOfMonth, 7) as $week)
                    <tr>
                        @foreach ($week as $day)
                            <td>
                                @if ($day != 0)
                                    <div class="flex flex-col gap-2">
                                        <div class="badge badge-outline">{{ $day }}</div>
                                        @livewire('pages.token.item', [$datas[implode('-', [$tanggal, $day])] ?? 0], key(uniqid()))
                                    </div>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </table>
    </div>

    @livewire('pages.kwhmeter.edit', [
        'token' => $token,
    ])
</div>
