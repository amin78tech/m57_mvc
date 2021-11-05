<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Admin;
use App\Models\Section;
use Kavenegar\KavenegarApi;

class SectionController {

    public function create() {
        View::render('dashboard/section/create');
    }

    public function store() {
        // TODO1 : validation
        // TODO2 : amaliat hash kardan be password ezafe shavad

        Section::do()->create([
            'title' => $_POST['title'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
        ]);

        addToSession('messages', [
            'success' => 'section created successfully.'
        ]);
        
        header('Location: /dashboard/sections');
    }

    public function show() {
        View::render('dashboard/section/show', [
            'sections' => Section::do()->all(),
        ]);
    }

    public function edit() {
        $admin = Section::do()->find($_GET['id']);

        if (is_null($admin)) {
            echo "not found";
            exit;
        }

        View::render('dashboard/section/edit', [
            'id' => $admin->id,
            'username' => $admin->username,
            'email' => $admin->email,
            'isActive' => $admin->is_active,
        ]);
    }

    public function update() {
        Section::do()->update([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
        ], ['id' => $_POST['id']]);

        header("Location: /dashboard/sections");
    }

    public function destroy() {
        Section::do()->delete(['id' => $_POST['id']]);

        header("Location: /dashboard/sections");
    }
}