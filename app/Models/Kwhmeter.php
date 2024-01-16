<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kwhmeter extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "token_id",
        "tanggal",
        "pemakaian",
        "photo",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function token(){
        return $this->belongsTo(Token::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('no-image.jpg');
    }
}
