<?php

namespace App\Controllers;

use App\Core\View;

class HomeController {
    public function index() {
        View::render('home', [
            'user' => 'mohamamd',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum numquam eos dicta nam magnam explicabo unde illum aliquam ab eligendi non ratione consequuntur esse, tempore consequatur nulla fugiat quis similique.'
        ]);
    }
}

