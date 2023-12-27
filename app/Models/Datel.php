<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datel extends Model
{
    use HasFactory;

    protected $fillable = [
        'witel',
        'datel',
    ];

    public static $witels = [
        'REGIONAL',
        'BALIKPAPAN',
        'SAMARINDA',
        'KALTENG',
        'KALTARA',
        'KALBAR',
        'KALSEL',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function lokasis(){
        return $this->hasMany(Lokasi::class);
    }
}
