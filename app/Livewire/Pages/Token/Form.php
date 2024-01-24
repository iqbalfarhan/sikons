<?php

namespace App\Livewire\Pages\Token;

use App\Models\Lokasi;
use App\Models\Token;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public Lokasi $lokasi;
    public ?Token $token;

    public $show = false;
    public $nopln;
    public $ukuran;
    public $daya;

    #[On('editToken')]
    public function editToken($token_id){
        $this->token = Token::find($token_id);

        $this->nopln = $this->token->nopln;
        $this->ukuran = $this->token->ukuran;
        $this->daya = $this->token->daya;

        $this->show = true;
    }

    public function mount(Lokasi $lokasi){
        $this->lokasi = $lokasi;
    }

    public function simpan(){
        $valid = $this->validate([
            'nopln' => 'required',
            'ukuran' => 'required',
            'daya' => 'required',
        ]);
        $valid['lokasi_id'] = $this->lokasi->id;

        if (isset($this->token)) {
            $this->token->update($valid);
        }
        else{
            Token::create($valid);
            $this->reset([
                'show',
                'nopln',
                'ukuran',
                'daya',
            ]);
        }

        $this->reset('show');
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.token.form');
    }
}
