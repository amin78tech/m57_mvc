<?php

namespace App\Controllers;

use App\Core\Cookie;
use App\Core\View;
use App\Models\Admin;

class AdminController {

    public function __construct()
    {
        // if (Cookie::get('user') == null) {
        //     header("Location: login");
        //     exit;
        // }
    }

    public function showDashboard() {
        $id = Cookie::get('user');

        View::render('home', [
            'name' => Cookie::get('user_name'),
        ]);
    }

    public function create() {
        View::render('dashboard/admin/create');
    }

    public function store() {
        // TODO1 : validation
        // TODO2 : amaliat hash kardan be password ezafe shavad

        Admin::do()->create([
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
        ]);

        header('Location: /dashboard/admin/create');
    }

    public function show() {
        View::render('dashboard/admin/show', [
            'admins' => Admin::do()->all(),
        ]);
    }
}