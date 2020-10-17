<?php

require_once 'index.php';

$username = readline();
$password = readline();
$confirmPassword = readline();

$userService = new \Services\Users\UserService(
    new \Repositories\Users\UserRepository($db),
    new \Services\Encryption\ArgonEncryptionService()
);

$userDTO = new \Data\Users\UserDTO($username, $password, $confirmPassword);

try {

    $userService->register($userDTO);

} catch (\Exception $e) {
    echo $e->getMessage();
}
