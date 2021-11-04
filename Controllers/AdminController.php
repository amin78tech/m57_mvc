<?php

namespace App\Controllers;

use App\Core\Cookie;
use App\Core\View;
use App\Models\Admin;

class AdminController {

    public function __construct()
    {
        if (Cookie::get('user') == null) {
            header("Location: login");
            exit;
        }
    }

    public function showDashboard() {
        $id = Cookie::get('user');

        View::render('home', [
            'name' => Cookie::get('user_name'),
        ]);
    }

    
}