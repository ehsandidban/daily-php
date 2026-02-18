<?php

$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = user_login($username, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        redirect('index');
    } else {
        $error = 'نام کاربری یا رمز عبور اشتباه است';
    }
}