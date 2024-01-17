<?php

namespace App\Livewire\Forms;

use App\Models\Kwhmeter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KwhmeterForm extends Form
{
    public ?Kwhmeter $kwhmeter;

    #[Validate('required', message:":attribute harus diisi")]
    public $user_id = "";
    #[Validate('required', message:":attribute harus diisi")]
    public $token_id = "";
    #[Validate('required', message:":attribute harus diisi")]
    public $tanggal = "";
    #[Validate('required', message:":attribute harus diisi")]
    public $pemakaian = "";
    #[Validate('required', message:":attribute harus diisi", onUpdate:false)]
    public $photo = "";
    public $oldphoto = "";

    public function setKwhmeter(Kwhmeter $kwhmeter){
        $this->user_id = $kwhmeter->user_id;
        $this->token_id = $kwhmeter->token_id;
        $this->tanggal = $kwhmeter->tanggal;
        $this->pemakaian = $kwhmeter->pemakaian;
        $this->oldphoto = $kwhmeter->image ?? "";
    }

    public function store(){
        Kwhmeter::create($this->all());
        $this->reset();
    }

    public function update(){
        $this->kwhmeter->update($this->all());
        $this->reset();
    }
}
