<?php
namespace Core\Helpers;

class Session {
    public static function create(string $coluna, mixed $data) {
        $_SESSION[$coluna] = $data;
    }

    public static function delete(string $coluna) {
        unset($_SESSION[$coluna]);
    }
}