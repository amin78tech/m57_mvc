<?php

namespace App\Controllers;

use App\Core\Database\MySql\Database;
use App\Core\View;
use App\Models\Clinic;

class HomeController {

    public function index() {
        
        View::render('home', [
            'user' => 'mohamamd',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum numquam eos dicta nam magnam explicabo unde illum aliquam ab eligendi non ratione consequuntur esse, tempore consequatur nulla fugiat quis similique.'
        ]);
    }

    public function test() {
        // Clinic::do()->setSection(6, 2);
        echo "<pre>";
        var_dump(Clinic::do()->getSections(6));
        echo "</pre>";
    }
}

