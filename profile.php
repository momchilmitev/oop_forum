<?php

require_once 'index.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];

$userService = new \Services\Users\UserService(
    new \Repositories\Users\UserRepository($db),
    new \Services\Encryption\ArgonEncryptionService()
);

$user = $userService->findBiId($id);

require_once 'views/users/profile.php';