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

    public function setSections($clinic_id, $section_id) {
        return $this->setManyToManyRelation($clinic_id, $section_id, 'clinic_section');
    }
}