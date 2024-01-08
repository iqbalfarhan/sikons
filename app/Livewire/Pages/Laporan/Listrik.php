<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Kwhmeter;
use App\Models\Lokasi;
use App\Models\Token;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Listrik extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $lokasi_id;
    public $tanggal;
    public $input = [];

    public function simpan()
    {
        $this->validate([
            'lokasi_id' =>'required',
            'tanggal' =>'required',
            'input.*.pemakaian' =>'required',
        ]);

        foreach ($this->input as $token_id => $data) {


            if (isset($data['photo'])) {
                $filename = $data['photo']->hashName('listrik');
                $photo = $data['photo'];
                $photo->storeAs('', $filename);
            }
            elseif(isset($data['oldphoto'])){
                $filename = $data['oldphoto'];
            }
            else{
                $filename = null;
            }

            Kwhmeter::updateOrCreate([
                'token_id' => $token_id,
                'tanggal' => $this->tanggal,
            ],[
                'user_id' => auth()->id(),
                'pemakaian' => $data['pemakaian'],
                'photo' => $filename,
            ]);
        }
        $this->alert('success', 'Berhasil disimpan');
    }

    public function updatedLokasiId(){
        $this->redata();
    }

    public function udpatedTanggal(){
        $this->redata();
    }

    public function redata(){
        $this->reset('input');

        $tokens = Token::whereHas('lokasi', fn($q) => $q->where('id', $this->lokasi_id))->pluck('id');
        foreach ($tokens as $id) {
            $kwhmeter = Kwhmeter::where('token_id', $id)->where('tanggal', $this->tanggal)->first();
            if ($kwhmeter) {
                $this->input[$id] = [
                    'photo' => null,
                    'pemakaian' => $kwhmeter->pemakaian ?? "",
                    'oldphoto' => $kwhmeter->photo ?? ""
                ];
            }
        }
    }

    public function mount()
    {
        $this->tanggal = date("Y-m-d");
    }

    public function render()
    {
        return view('livewire.pages.laporan.listrik', [
            'lokasis' => Lokasi::where('datel_id', auth()->user()->datel_id)->pluck('name', 'id'),
            'datas' => Token::where('lokasi_id', $this->lokasi_id)->pluck('nopln', 'id') ?? collect()
        ]);
    }
}
