<?php

namespace App\Core;

class View {
    private static $rootDir = __DIR__ .  "/../View/";

    public static function render(string $path, array $data = []) {
        $filePath = self::$rootDir . $path . '.php';

        foreach ($data as $key => $value) 
            $$key = $value;

        foreach ($_SESSION['messages'] as $key => $value) 
            $$key = $value;

        removeFromSession('messages');

        ob_start();

        require $filePath;

        if (isset($layout)) {
            $layoutPath = self::$rootDir . 'Layout/' . $layout . '.php';
        }
        
        $child = ob_get_clean();

        if (isset($layoutPath)) {

            ob_start();

            require $layoutPath;

            $layout = ob_get_clean();

            echo str_replace('{{content}}', $child, $layout);

        } else {
            echo $child;
        }

    }
}