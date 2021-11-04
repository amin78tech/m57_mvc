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

    public function update(array $data, array $where) {
        $this->db->update($data, $where);
    }

    public function delete(array $where) {
        $this->db->remove($where);
    }

    public function find(string $value, string $column = 'id') {
        $model = $this->db->read([
            $column => $value
        ]);

        if (count($model) === 0)
            return null;

        return $model[0];
    }

    public function all() {
        return $this->db->read();
    }
}