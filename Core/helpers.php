<?php

function createCookie($name, $value, $options = []) {
    setcookie($name, $value, $options);
}

function getCookie($name) {
    return $_COOKIE[$name];
}

function destroyCookie($name) {
    setcookie($name, '', [
        'expires' => 0,
    ]);
}

function addToSession($name, $value) {
    $_SESSION[$name] = $value;
}

function removeFromSession($name) {
    unset($_SESSION[$name]);
}

function refreshSession() {
    session_destroy();
}

function env(string $key) {
    return trim(getenv($key));
}

function setEnvs() {
    $path = __DIR__ . "/../.env";
    $content = fopen($path, 'r');

    while(!feof($content)) {
        putenv(fgets($content));
    }

    fclose($content);
}