<?php

namespace App\Controllers;

use App\Core\Cookie;
use App\Core\View;
use App\Models\Admin;

class AuthController {

    public function showLogin() {
        View::render('login');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $founded = Admin::do()->find($email);

        if (count($founded) === 0) {
            header("Location: login");
            exit();
        }
        $founded = $founded[0];

        if ($founded->password == $password) {

            Cookie::create('user', $founded->id);
            Cookie::create('user_name', $founded->username);
            header("Location: dashboard");

        } else {
            header("Location: login");
        }
    }
}