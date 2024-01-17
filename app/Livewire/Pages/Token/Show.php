<?php

namespace App\Livewire\Pages\Token;

use App\Models\Kwhmeter;
use App\Models\Token;
use DateTime;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Show extends Component
{
    public Token $token;
    public $tahun;
    public $bulan;
    public $tanggal;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Token $token){
        $this->token = $token;
        $this->tahun = date('Y');
        $this->bulan = date('m');

        $this->tanggal = date("Y-m");
    }

    public function updatedTanggal($tanggal){
        list($tahun,$bulan) = explode("-", $tanggal);

        $this->tahun = $tahun;
        $this->bulan = $bulan;

        $this->dispatch('reload');
    }

    public function render()
    {
        $datas = Kwhmeter::where('token_id', $this->token->id)
                            ->whereYear('tanggal', $this->tahun)
                            ->whereMonth('tanggal', $this->bulan)
                            ->pluck('id', 'tanggal');

        $dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $daysOfMonth = range(1, cal_days_in_month(CAL_GREGORIAN, $this->bulan, $this->tahun));

        $firstDayOfMonth = new DateTime("{$this->tahun}-{$this->bulan}-01");
        $startDayOfWeek = (int) $firstDayOfMonth->format('N');

        $daysOfMonth = array_merge(array_fill(0, $startDayOfWeek, 0), $daysOfMonth);

        return view('livewire.pages.token.show', [
            'datas' => $datas,
            'dayNames' => $dayNames,
            'daysOfMonth' => $daysOfMonth,
        ]);
    }
}
