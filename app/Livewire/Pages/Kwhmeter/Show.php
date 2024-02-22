<?php

namespace App\Livewire\Pages\Kwhmeter;

use App\Models\Kwhmeter;
use App\Models\Token;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class Show extends Component
{
    public Token $token;

    protected $listeners = ['reload', '$refresh'];

    public function mount(Token $token){
        $this->token = $token;
    }

    public function randomize(){
        $penggunaanawal = 1000;
        list($tahun, $bulan) = explode("-", date('Y-m'));

        $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        for ($hari = 1; $hari <= $jumlah_hari; $hari++) {
            $selisih = rand(0, 20);
            $tanggal = date('Y-m-d', strtotime(implode('-', [$tahun, $bulan, $hari])));
            $penggunaanawal = $penggunaanawal + $selisih;

            Kwhmeter::updateOrCreate([
                'tanggal' => $tanggal,
                'token_id' => $this->token->id,
            ],[
                'user_id' => 1,
                'pemakaian' => $penggunaanawal,
                'photo' => null,
            ]);
        }

        $this->dispatch('reload');
    }

    public function render()
    {
        list($tahun, $bulan) = explode('-', date('Y-m'));

        $lineChartModel = (new LineChartModel())->setDataLabelsEnabled(false);
        $kwhmeters = Kwhmeter::where('token_id', $this->token->id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal')
            ->pluck('pemakaian', 'tanggal')
        ;

        $lastMonth = date("Y-m-t", strtotime("last month"));
        $lastmothpemakaian = Kwhmeter::where('token_id', $this->token->id)
            ->where('tanggal', $lastMonth)
            ->first()->pemakaian ?? $kwhmeters->first();

        $prevPemakaian = null;

        foreach ($kwhmeters as $tanggal => $pemakaian) {
            if ($prevPemakaian !== null) {
                $selisih = $pemakaian - $prevPemakaian;
                $lineChartModel->addPoint(substr($tanggal, -2), $selisih);
            }
            else{
                $lineChartModel->addPoint(substr($tanggal, -2), $pemakaian - $lastmothpemakaian);
            }
            $prevPemakaian = $pemakaian;
        }

        return view('livewire.pages.kwhmeter.show', [
            'kwhmeters' => $kwhmeters,
            'lineChartModel' => $lineChartModel
        ]);
    }
}
