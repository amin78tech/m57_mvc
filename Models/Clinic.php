<?php

namespace App\Models;

use App\Core\Database\MySql\Database;
use App\Core\Model;

class Clinic extends Model {

    protected $table = 'clinics';

    public function getSections($clinic_id) {

        return $this->getManyToManyRelation(
            $clinic_id,
            'clinic_section',
            'sections',
            'clinic_id',
            'section_id',
        );
    }

    public function getSectionsId($clinic_id) {
        return $this->getManyToManyIds(
            $clinic_id,
            'clinic_section',
            'clinic_id',
            'section_id',
        );
    }

    public function setSections($clinic_id, $section_id) {
        return $this->setManyToManyRelation($clinic_id, $section_id, 'clinic_section');
    }

    public function syncSections($clinic_id, array $ids) {
        Database::onTable('clinic_section')->remove([
            'clinic_id' => $clinic_id,
        ]);

        foreach($ids as $id) {
            Clinic::do()->setSections($clinic_id, $id);
        }
    }
}