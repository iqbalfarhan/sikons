<?php

namespace App\Livewire\Pages\Kwhmeter;

use App\Models\Token;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $show = true;
    public $pemakaian = [];

    #[On('showKwhmeter')]
    public function showKwhmeter(Token $token)
    {
        $this->pemakaian = $token->kwhmeters->pluck('pemakaian', 'tanggal')->toArray();
        $this->show = true;
    }

    public function mount(){
        $this->showKwhmeter(Token::find(4));
    }

    public function render()
    {
        return view('livewire.pages.kwhmeter.show');
    }
}
