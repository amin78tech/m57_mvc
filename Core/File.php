<?php

namespace App\Core;

class File {
    private $path;
    private $name;

    // TODO3 : method delete ezafe shavad
    // TODO4 : dar sorat edit ya delete user akas ghadimi profile vey niz hazf 

    public function __construct(string $path, bool $uploaded = false) {
        if ($uploaded) {
            $this->name = $path;
            $this->path = $_FILES[$path]['tmp_name'];
        }
        else
            $this->path = $path;
    }   

    public static function uploadedFile(string $name) {
        return new self($name, true);
    }

    public static function pathToUrl(string $path) {
        return strstr($path, '/storage');
    } 

    public function save(string $path) {
        $path .= uniqid();
        move_uploaded_file($this->path, $path);
        return $path;
    }

    public function validate(array $rules,array $success) {
        $result = true;
        foreach($rules as $rule => $params) {
            $result = call_user_func_array([$this, $rule], $params);

            if(!$result)
                break;
        }

        if ($result) {
            return call_user_func_array($success['callback'], $success['params']);
        }
    }

    private function checkSize($max, $min = 0) {
        $size = $_FILES[$this->name]['size'] / 1000;

        if ($size > $max || $size < $min)
            return false;

        return true;
    }

    private function checkType($type) {
        return !(strpos($_FILES[$this->name]['type'], $type) === false);
    }

}