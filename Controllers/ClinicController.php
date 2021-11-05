<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Admin;
use App\Models\Clinic;
use Kavenegar\KavenegarApi;

class ClinicController {

    public function create() {
        View::render('dashboard/clinic/create');
    }

    public function store() {
        // TODO1 : validation
        // TODO2 : amaliat hash kardan be password ezafe shavad

        Clinic::do()->create([
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
            'is_full_time' => $_POST['isFullTime'] == 'on' ? 1 : 0 ,
        ]);

        addToSession('messages', [
            'success' => 'clinic created successfully.'
        ]);
        
        header('Location: /dashboard/clinics');
    }

    public function show() {
        View::render('dashboard/clinic/show', [
            'clinics' => Clinic::do()->all(),
        ]);
    }

    public function edit() {
        $admin = Admin::do()->find($_GET['id']);

        if (is_null($admin)) {
            echo "not found";
            exit;
        }

        View::render('dashboard/clinic/edit', [
            'id' => $admin->id,
            'username' => $admin->username,
            'email' => $admin->email,
            'isActive' => $admin->is_active,
        ]);
    }

    public function update() {
        // TODO1 : validation

        Admin::do()->update([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
        ], ['id' => $_POST['id']]);

        header("Location: /dashboard/clinics");
    }

    public function destroy() {
        Clinic::do()->delete(['id' => $_POST['id']]);

        header("Location: /dashboard/clinics");
    }
}