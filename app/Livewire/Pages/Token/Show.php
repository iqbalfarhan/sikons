<?php

namespace App\Livewire\Pages\Token;

use App\Models\Kwhmeter;
use App\Models\Token;
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
        $firstDay = Carbon::createFromDate($this->tahun, $this->bulan);
        $datas = Kwhmeter::where('token_id', $this->token->id)
                            ->whereYear('tanggal', $this->tahun)
                            ->whereMonth('tanggal', $this->bulan)
                            ->pluck('id', 'tanggal');

        return view('livewire.pages.token.show', [
            'datas' => $datas,
            'daysInMonth' => $firstDay->daysInMonth,
            'startDayOfWeek' => $firstDay->dayOfWeek,
        ]);
    }
}
