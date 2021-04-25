<?php


namespace App\Helpers;


class Helper
{
    public static function firstMonthToDate($date)
    {
        $date = explode('/',$date);
        $date = [$date[2],$date[0],$date[1]];
        return implode('-',$date);
    }
}
