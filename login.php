<?php

require_once 'index.php';

$error = '';
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $userService = new \Services\Users\UserService(
        new \Repositories\Users\UserRepository($db),
        new \Services\Encryption\ArgonEncryptionService()
    );

    if ($userService->verifyCredentials($username, $password)) {
        $user = $userService->findByUsername($username);
        $_SESSION['id'] = $user->getId();
        header("Location: profile.php");
        exit;
    } else {
        $error =  "Wrong credentials!";
    }
}

require_once 'views/users/login.php';

