<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'datel_id',
        'name',
        'timezone'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scopeWitel($query, $witel){
        return $query->whereHas('datel', function($q) use ($witel){
            return $q->where('witel', $witel);
        });
    }

    public function scopeDatelname($query, $datel){
        return $query->whereHas('datel', function($q) use ($datel){
            return $q->where('name', $datel);
        });
    }

    public function datel(){
        return $this->belongsTo(Datel::class);
    }

    public function tokens(){
        return $this->hasMany(Token::class);
    }
}
