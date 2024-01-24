<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id',
        'nopln',
        'ukuran',
        'daya',
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }

    public function kwhmeters(){
        return $this->hasMany(Kwhmeter::class)->orderBy('tanggal', 'ASC');
    }

    public function getTodayAttribute(){
        return $this->kwhmeters()->where('tanggal', now()->format('Y-m-d'))->first()->pemakaian ?? null;
    }

    public function getYesterdayAttribute(){
        return $this->kwhmeters()->where('tanggal', now()->subDay()->format('Y-m-d'))->first()->pemakaian ?? null;
    }

    public function getSelisihAttribute(){
        return abs($this->today - $this->yesterday);
    }
}
