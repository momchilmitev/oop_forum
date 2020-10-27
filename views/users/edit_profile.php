<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit your profile</title>
</head>
<body>
<h1>Edit Profile</h1>
<div>
    <?php foreach ($errors as $error): ?>
        <h2><?= $error; ?></h2>
    <?php endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" value="<?= $user->getUsername(); ?>" name="username"><br>
    Old Password: <input type="password" name="old"><br>
    New Password: <input type="password" name="new"><br>
    Profile Picture: <input type="file" name="profile_picture"><br>
    <input type="submit" name="edit" value="Edit"><br>
</form>
</body>
</html>