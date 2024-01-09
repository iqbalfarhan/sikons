<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id',
        'tanggal',
        'user_id',
        'waktu',
        'lingkungan',
        'bbm',
        'perangkat',
        'apar',
        'apd',
        'cuaca',
        'pln',
        'genset',
        'gedung',
        'ev_lingkungan',
        'ev_gedung',
        'catatan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeMine(){
        return $this->where('user_id', auth()->id());
    }

    public function scopePagi(){
        return $this->where('waktu', 'pagi');
    }

    public function scopeSore(){
        return $this->where('waktu', 'sore');
    }

    public function scopeMalam(){
        return $this->where('waktu', 'malam');
    }

    public function scopeToday(){
        return $this->whereDate('created_at', date('Y-m-d'));
    }

    public function getDescAttribute(){
        return implode(" ", [
            "Dilaporkan bahwa kondisi lapangan saat jaga",
            $this->lingkungan,
            "•",
            "stok bbm",
            $this->bbm,
            "berada",
            $this->bbm == "aman" ? "diatas 50%" : "dibawah 50%",
            "•",
            "semua perangkat dalam keadaan",
            $this->perangkat,
            "•",
            "alat pemadan api ringan dalam keadaan",
            $this->apar == "aman" ? "baik" : "tidak baik",
            "•",
            "alat pelindung diri juga dalam kondisi ",
            $this->apd == "aman" ? "lengkap" : "tidak lengkap",
            "•",
            "Saat berjaga kondisi dalam keadaan cerah",
            "•",
            "Listrik PLN dalam keadaan $this->pln",
            "genset dalam keadaan $this->genset dan",
            "kondisi gedung",
            $this->gedung == "normal" ? "normal tidak ada kebocoran atau kerusakan." : $this->gedung,
            "•"
        ]);
    }

    public function scopeWitel($query, $witel)
    {
        return $query->whereHas('lokasi.datel', function($q) use ($witel){
            $q->where('witel', $witel)->orWhere('name', $witel);
        });
    }

    public function scopeDatel($query, $datel)
    {
        return $query->whereHas('lokasi.datel', function($q) use ($datel){
            $q->where('name', $datel);
        });
    }

    public function scopeLokasi($query, $lokasi)
    {
        return $query->whereHas('lokasi', function($q) use ($lokasi){
            $q->where('name', $lokasi);
        });
    }

    public function scopeLingkungan($query, $status)
    {
        return $query->where('lingkungan', $status);
    }

    public function scopeCuaca($query, $status)
    {
        return $query->where('cuaca', 'like', "%".$status."%");
    }

    public function scopePln($query, $status)
    {
        return $query->where('pln', $status);
    }

    public function getThumbnailAttribute(){
        return $this->ev_lingkungan ? Storage::url($this->ev_lingkungan) : url('no-image.jpg');
    }
}
