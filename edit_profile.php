<?php

use Data\Users\UserEditDTO;

require_once 'secure_common.php';

$errors = [];

if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new'];

    try {
        $userService->edit($id, new UserEditDTO($id, $username, $oldPassword, $newPassword));
        $userService->setProfilePicture(
            $id,
            $_FILES['profile_picture']['tmp_name'],
            $_FILES['profile_picture']['type'],
            $_FILES['profile_picture']['size'],
        );
        header("Location: profile.php");
        exit;
    } catch (\Exception $e) {
        $errors[] = $e->getMessage();
    }
}

require_once 'views/users/edit_profile.php';