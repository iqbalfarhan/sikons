<?php

namespace App\Livewire\Pages\Kwhmeter;

use App\Livewire\Forms\KwhmeterForm;
use App\Models\Kwhmeter;
use App\Models\Token;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ?Kwhmeter $kwhmeter = null;
    public KwhmeterForm $form;
    public ?Token $token;
    public $tanggal;
    public $show = false;
    public $photo;

    public function updatedTanggal($tanggal){
        $this->kwhmeter = Kwhmeter::where('tanggal', $tanggal)->where('token_id', $this->token->id)->first();
        if ($this->kwhmeter instanceof Kwhmeter) {
            $this->form->setKwhmeter($this->kwhmeter);
        }
    }

    public function simpan(){
        $filename = null;

        if (isset($this->photo)) {
            $filename = $this->photo->hashName('listrik');
            $photo = $this->photo;
            $photo->storeAs('', $filename);
        }
        elseif(isset($this->oldphoto)){
            $filename = $this->oldphoto;
        }

        $this->form->photo = $filename;
        $this->form->store();

        $this->dispatch('reload');

        $this->reset(['photo', 'tanggal', 'kwhmeter', 'show']);
    }

    public function mount(){
        $this->form->token_id = $this->token->id;
    }

    public function render()
    {
        return view('livewire.pages.kwhmeter.edit');
    }
}
