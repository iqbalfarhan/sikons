<div class="page-wrapper">

    @livewire('partial.header')

    <div class="flex flex-col md:flex-row justify-between gap-4">
        <input type="month" wire:model.live='tanggal' class="input input-bordered">
        @livewire('pages.kwhmeter.edit', [
            'token' => $token,
        ])
    </div>

    <div class="table-wrapper">
        <table class="table">
            <table class="table">
                <thead class="text-center">
                    @foreach ($dayNames as $name)
                        <th style="width: {{ 100 / 7 }}%">{{ $name }}</th>
                    @endforeach
                </thead>
                @foreach (array_chunk($daysOfMonth, 7) as $week)
                    <tr>
                        @foreach ($week as $day)
                            @php
                                $day = str_pad($day, 2, '0', STR_PAD_LEFT);
                                $fulldate = implode('-', [$tanggal, $day]);
                            @endphp
                            <td wire:key="{{ uniqid() }}">
                                @if ($day != 0)
                                    <div class="flex flex-col gap-2">
                                        <div class="btn btn-xs btn-circle btn-outline group">
                                            {{ $day }}
                                        </div>
                                        @livewire('pages.token.item', [$datas[$fulldate]], key(uniqid()))
                                    </div>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </table>
    </div>
</div>
