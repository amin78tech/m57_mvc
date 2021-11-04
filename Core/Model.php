<?php

namespace App\Core;

use App\Core\Database\MySql\Database;

abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = new Database; 
        $this->db->setTable($this->table);
    }

    public static function do() {
        return new static;
    }

    public function create(array $data) {
        $this->db->insert($data);
    }

    public function all() {
        return $this->db->read();
    }
}