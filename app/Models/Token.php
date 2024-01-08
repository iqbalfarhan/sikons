<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'nopln',
        'ukuran',
        'daya',
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }
}
