<?php

namespace App\Livewire\Forms;

use App\Models\Lokasi;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LokasiForm extends Form
{
    #[Validate('required')]
    public $name = "";
    #[Validate('required')]
    public $datel_id = "";
    #[Validate('required')]
    public $timezone = "WITA";

    public function store(){
        $this->validate();
        Lokasi::create($this->all());
        $this->reset();
    }
}
