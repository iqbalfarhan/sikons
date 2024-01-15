<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function view() : View
    {
        return view('exports.laporan', [
            'datas' => $this->datas
        ]);
    }
}
