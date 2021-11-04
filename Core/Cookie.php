<?php 

namespace App\Core;

class Cookie {
    public static function create($name, $value, $options = []) {
        setcookie($name, $value, $options);
    }

    public static function get($name) {
        return $_COOKIE[$name];
    }

    public static function destroy($name) {
        setcookie($name, '', [
            'expires' => 0,
        ]);
    }
}