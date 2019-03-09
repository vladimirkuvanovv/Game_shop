<?php


namespace app\Helpers;


/**
 * Class Helper
 * @package app\Helpers
 */
class Helper
{
    /**
     * @param $endings
     * @param $number
     *
     * @return string
     */
    public static function plural($endings, $number)
    {
        $cases = [2, 0, 1, 1, 1, 2];
        $n = $number;
        return sprintf($endings[ ($n%100>4 && $n%100<20) ? 2 : $cases[min($n%10, 5)] ], $n);
    }

}
