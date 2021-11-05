<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Admin;
use App\Models\Clinic;
use App\Models\Section;
use Kavenegar\KavenegarApi;

class ClinicController {

    public function create() {
        View::render('dashboard/clinic/create', [
            'sections' => Section::do()->all(),
        ]);
    }

    public function store() {
        // TODO1 : validation
        // TODO2 : amaliat hash kardan be password ezafe shavad

        $clinic_id = Clinic::do()->create([
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
            'is_full_time' => $_POST['isFullTime'] == 'on' ? 1 : 0 ,
        ]);

        foreach($_POST['sections'] as $id) {
            Clinic::do()->setSections($clinic_id, $id);
        }

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
        $clinic = Clinic::do()->find($_GET['id']);

        if (is_null($clinic)) {
            echo "not found";
            exit;
        }

        View::render('dashboard/clinic/edit', [
            'id' => $clinic->id,
            'name' => $clinic->name,
            'address' => $clinic->address,
            'phone' => $clinic->phone,
            'isActive' => $clinic->is_active,
            'isFullTime' => $clinic->is_full_time,
            'sections' => Section::do()->all(),
            'selectedSections' => Clinic::do()->getSectionsId($_GET['id']),
        ]);
    }

    public function update() {
        // TODO1 : validation

        Clinic::do()->update([
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'is_active' => $_POST['isActive'] == 'on' ? 1 : 0 ,
            'is_full_time' => $_POST['isFullTime'] == 'on' ? 1 : 0 ,
        ], ['id' => $_POST['id']]);

        Clinic::do()->syncSections($_POST['id'], $_POST['sections']);

        addToSession('messages', [
            'success' => 'clinic updated successfully.'
        ]);
        
        header('Location: /dashboard/clinics');
    }

    public function destroy() {
        Clinic::do()->delete(['id' => $_POST['id']]);

        header("Location: /dashboard/clinics");
    }
}