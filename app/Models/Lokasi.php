<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'datel_id',
        'name'
    ];

    public function datel(){
        return $this->belongsTo(Datel::class);
    }

    public function tokens(){
        return $this->hasMany(Token::class);
    }
}
