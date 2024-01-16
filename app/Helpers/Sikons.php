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
}
