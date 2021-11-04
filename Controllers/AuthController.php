<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Admin;
use App\Models\User;

class AuthController {

    public function showLogin() {
        View::render('login');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $founded = Admin::do()->find($email);

        var_dump($founded);

        if (count($founded) === 0) {
            header("Location: login");
            exit();
        }

        if ($founded[0]->password == $password) {
            header("Location: https://google.com");
        } else {
            header("Location: login");
        }
    }
}