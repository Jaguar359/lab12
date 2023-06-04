<?php

namespace app\models;

/**
 * @package app\models
 */
class Debug
{
    /**
     * var_dump($string)
     *
     * @param $string
     */
    public static function vd($string)
    {
        echo '<pre>';
        var_dump($string);
        echo '</pre>';
    }
}