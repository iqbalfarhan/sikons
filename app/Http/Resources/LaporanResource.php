<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'lokasi' => $this->lokasi->name,
            'datel' => $this->lokasi->datel->name,
            'witel' => $this->lokasi->datel->witel,
            'tanggal' => $this->tanggal->format('Y-m-d'),
            'petugas' => $this->user->name,
            'waktu' => $this->waktu,
            'lingkungan' => $this->lingkungan,
            'bbm' => $this->bbm,
            'perangkat' => $this->perangkat,
            'apar' => $this->apar,
            'apd' => $this->apd,
            'cuaca' => $this->cuaca,
            'pln' => $this->pln,
            'genset' => $this->genset,
            'gedung' => $this->gedung,
            'ev_lingkungan' => $this->thumbnail,
            'ev_gedung' => $this->ev_gedung,
            'catatan' => $this->catatan,
            'score' => $this->score,
        ];
    }
}
