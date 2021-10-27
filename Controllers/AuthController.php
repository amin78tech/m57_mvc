<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class AuthController {

    public function showRegister() {
        View::render('register');
    }

    public function showLogin() {
        View::render('login');
    }

    public function register() {
        User::do()->create([
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ]);

        echo 'user registered successfully';
    }

    public function login() {
        $user = User::do()->find($_POST['username']);
        if (count($user)) {
            $user = $user[0];

            if ($user->password == md5($_POST['password'])) {
                echo "you are loged in";
            } else {
                echo "your password is wrong";
            }

        } else {
            echo "username not found";
        }
    }
}