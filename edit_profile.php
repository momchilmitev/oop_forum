<?php

use Data\Users\UserEditDTO;

require_once 'secure_common.php';

$error = '';

if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new'];

    try {
        $userService->edit($id, new UserEditDTO($id, $username, $oldPassword, $newPassword));
        header("Location: profile.php");
        exit;
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}

require_once 'views/users/edit_profile.php';