<?php

namespace Dashboard\Helpers;

use Illuminate\Database\Eloquent\Model;

class HelperConsistency extends Model
{
    public static function clearField(?string $param)
    {
        if (empty($param)) {
            return '';
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

    public static function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        if (strstr($param, "-")) {
            return $param;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

    public static function convertStringToDouble(string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', floatval($param)));
    }

    public static function convertStringToInt(string $param = null)
    {
        if (empty($param)) {
            return 0;
        }

        return str_replace(',', '.', intval($param));
    }
}
