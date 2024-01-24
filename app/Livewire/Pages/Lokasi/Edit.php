<?php

namespace App\Livewire\Pages\Lokasi;

use App\Models\Datel;
use App\Models\Lokasi;
use App\Models\Token;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public Lokasi $lokasi;
    public $name;
    public $datel_id;

    protected $listeners = ['reload' => '$refresh'];

    public function mount(Lokasi $lokasi){
        $this->lokasi = $lokasi;
        $this->name = $lokasi->name;
        $this->datel_id = $lokasi->datel_id;
    }

    public function simpan(){
        $valid = $this->validate([
            'datel_id' => 'required',
            'name' => 'required',
        ]);

        $this->lokasi->update($valid);

        $this->alert('success', 'data lokasi berhasil diupdate');
    }

    public function deleteToken(Token $token){
        $token->delete();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.lokasi.edit', [
            'datels' => Datel::get()->groupBy('witel'),
        ]);
    }
}
