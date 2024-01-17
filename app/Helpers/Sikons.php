<?php

namespace App\Helpers;

class Sikons
{
    public static function persen($part, $total){
        if ($total != 0) {
            $percentage = ($part / $total) * 100;
            return number_format($percentage, 0) . '%';
        } else {
            return '0%';
        }
    }

    public static function noimage(){
        $theme = session('theme') ?: "dark";
        return url("no-image-$theme.jpg");
    }

    public static function weekNumber($bulan, $tanggal, $tahun){
        return date('w', mktime(month:$bulan, day:$tanggal, year:$tahun, hour:0));
    }

    public static function countWeeksInMonth($tahun, $bulan) {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $firstDay = date("N", strtotime("$tahun-$bulan-01"));
        $weeks = ceil(($daysInMonth + $firstDay - 1) / 7);

        return $weeks;
    }
}
