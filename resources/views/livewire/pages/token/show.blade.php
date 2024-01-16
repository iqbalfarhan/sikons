<div class="page-wrapper max-w-7xl">

    <div class="flex justify-between">
        @livewire('partial.header')
        <input type="month" wire:model.live='tanggal' class="input input-bordered">
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th width="{{ 100 / 7 }}%">Senin</th>
                <th width="{{ 100 / 7 }}%">Selasa</th>
                <th width="{{ 100 / 7 }}%">Rabu</th>
                <th width="{{ 100 / 7 }}%">Kamis</th>
                <th width="{{ 100 / 7 }}%">Jumat</th>
                <th width="{{ 100 / 7 }}%">Sabtu</th>
                <th width="{{ 100 / 7 }}%">Minggu</th>
            </thead>

            @php
                $dayCounter = 1;
            @endphp

            <tr>
                @for ($i = 1; $i <= 7; $i++)
                    @if ($i < $startDayOfWeek)
                        <td></td>
                    @else
                        <td>@livewire('pages.token.item', [$datas[implode('-', [$tanggal, $dayCounter])] ?? 0], key($dayCounter))</td>
                        @php
                            $dayCounter++;
                        @endphp
                    @endif
                @endfor
            </tr>

            @for ($row = 2; $row <= 6; $row++)
                <tr>
                    @for ($col = 1; $col <= 7; $col++)
                        @if ($dayCounter <= $daysInMonth)
                            <td>
                                @livewire('pages.token.item', [$datas[implode('-', [$tanggal, $dayCounter])] ?? 0], key($dayCounter))
                            </td>
                            @php
                                $dayCounter++;
                            @endphp
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
            @endfor

        </table>
    </div>

    <pre>@json($datas, JSON_PRETTY_PRINT)</pre>
</div>
