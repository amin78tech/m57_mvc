<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\File;
use App\Core\View;
use App\Models\Admin;
use Kavenegar\KavenegarApi;

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

        $file_uploaded = false;

        if ($_FILES['profile']['error'] == 0) {
            $file = File::uploadedFile('profile');

            $path = $file->validate([
                'checkSize' => [10000],
                'checkType' => ['image'],
            ], [
                'callback' => [$file, 'save'],
                'params' => [ App::$ROOTDIR . 'public/storage/']
            ]);

            $file_uploaded = true;
        }

        Admin::do()->create([
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
            'profile_path' => $file_uploaded ? $path : null,
        ]);

        addToSession('messages', [
            'success' => 'user created successfully.'
        ]);

        // (new KavenegarApi('4A514462557A50454A446B715A7A4D6F343546444E7672542F56552B364D52536A766D684F675932456B553D'))
            // ->Send('2000500666', $_POST['phone'], 'your account created successfully.');
        
        header('Location: /dashboard/admins');
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