<?php
namespace Core\Helpers;

class Helper {
    public static function url(string $path = null) {
        return $url = (is_null($path)) ? APP_URL : APP_URL . $path ;
    }
}