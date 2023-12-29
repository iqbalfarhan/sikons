<?php

namespace App\Livewire\Forms;

use App\Models\Laporan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LaporanForm extends Form
{
    public ?Laporan $laporan;

    #[Validate('required', message:":attribute harus di isi", as:"lokasi jaga")]
    public $lokasi_id = "";
    #[Validate('required', message:":attribute harus di isi")]
    public $user_id = "";
    #[Validate('required', message:":attribute harus di isi")]
    public $waktu = "pagi";
    #[Validate('required', message:":attribute harus di isi")]
    public $lingkungan = "aman";
    #[Validate('required', message:":attribute harus di isi")]
    public $bbm = "aman";
    #[Validate('required', message:":attribute harus di isi")]
    public $perangkat = "aman";
    #[Validate('required', message:":attribute harus di isi")]
    public $apar = "aman";
    #[Validate('required', message:":attribute harus di isi")]
    public $apd = "aman";
    #[Validate('required', message:":attribute harus di isi")]
    public $cuaca = "cerah";
    #[Validate('required', message:":attribute harus di isi")]
    public $pln = "on";
    #[Validate('required', message:":attribute harus di isi")]
    public $genset = "off";
    #[Validate('required', message:":attribute harus di isi")]
    public $gedung = "normal";
    #[Validate('required', message:":attribute harus di isi", as: "photo")]
    public $ev_lingkungan = "";
    #[Validate('required', message:":attribute harus di isi")]
    public $ev_gedung = "";
    #[Validate('required', message:":attribute harus di isi")]
    public $catatan = "Semua parameter aman";

    public function setLaporan(Laporan $laporan){
        $this->laporan = $laporan;

        $this->lokasi_id = $laporan->lokasi_id;
        $this->user_id = $laporan->user_id;
        $this->waktu = $laporan->waktu;
        $this->lingkungan = $laporan->lingkungan;
        $this->bbm = $laporan->bbm;
        $this->perangkat = $laporan->perangkat;
        $this->apar = $laporan->apar;
        $this->apd = $laporan->apd;
        $this->cuaca = $laporan->cuaca;
        $this->pln = $laporan->pln;
        $this->genset = $laporan->genset;
        $this->gedung = $laporan->gedung;
        $this->ev_lingkungan = $laporan->ev_lingkungan;
        $this->ev_gedung = $laporan->ev_gedung;
        $this->catatan = $laporan->catatan;
    }

    public function store(){
        $this->validate();
        Laporan::create($this->all());
        $this->reset();
    }

    public function update(){
        $this->validate();
        $this->laporan->update($this->all());
        $this->reset();
    }
}
