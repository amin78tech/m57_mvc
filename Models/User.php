<?php

namespace App\Models;

use App\Core\Model;

class User extends Model {

    protected $table = 'users';

    public function create($data) {
        $this->db->insert($data);
    }

    public function find(string $username) {
        return $this->db->read([
            'username' => $username
        ]);
    }

}