<?php

namespace App\Controllers;

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
        $id = getCookie('user');

        View::render('home', [
            'name' => getCookie('user_name'),
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

        addToSession('messages', [
            'success' => 'user created successfully.'
        ]);
        
        header('Location: /dashboard/admin/create');
    }

    public function show() {
        View::render('dashboard/admin/show', [
            'admins' => Admin::do()->all(),
        ]);
    }

    public function edit() {
        $admin = Admin::do()->find($_GET['id']);

        if (is_null($admin)) {
            echo "not found";
            exit;
        }

        View::render('dashboard/admin/edit', [
            'id' => $admin->id,
            'username' => $admin->username,
            'email' => $admin->email,
            'isActive' => $admin->is_active,
        ]);
    }

    public function update() {
        Admin::do()->update([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
        ], ['id' => $_POST['id']]);

        header("Location: /dashboard/admins");
    }

    public function destroy() {
        Admin::do()->delete(['id' => $_POST['id']]);

        header("Location: /dashboard/admins");
    }
}