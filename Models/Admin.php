<?php

namespace App\Models;

use App\Core\Model;

class Admin extends Model {

    protected $table = 'admins';

    public function find(string $email) {
        return $this->db->read([
            'email' => $email
        ]);
    }
}