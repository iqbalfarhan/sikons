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
        'BALIKPAPAN',
        'SAMARINDA',
        'KALTENG',
        'KALTARA',
        'KALBAR',
        'KALSEL',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function lokasis(){
        return $this->hasMany(Lokasi::class);
    }

    public function getLabelAttribute(){
        return implode(' ', [
            $this->name,
            $this->witel,
        ]);
    }
}
