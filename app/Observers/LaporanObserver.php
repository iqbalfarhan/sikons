<?php

namespace App\Observers;

use App\Models\Laporan;

class LaporanObserver
{
    public function created(Laporan $laporan){
        $score = $this->hitungScore($laporan->waktu, $laporan->created_at);
        $laporan->update(['score' => $score]);
    }

    public function hitungScore($waktuJaga, $createdAt) {

        $jamLaporan = date('H', strtotime($createdAt));

        if ($waktuJaga === "malam") {
            if ($jamLaporan == 23) {
                return 3;
            } elseif ($jamLaporan == 0) {
                return 2;
            } else {
                return 1;
            }
        } elseif ($waktuJaga === "pagi") {
            if ($jamLaporan == 7) {
                return 3;
            } elseif ($jamLaporan == 8) {
                return 2;
            } else {
                return 1;
            }
        } elseif ($waktuJaga === "sore") {
            if ($jamLaporan == 15) {
                return 3;
            } elseif ($jamLaporan == 16) {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }
}
