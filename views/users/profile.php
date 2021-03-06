<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <h2>Welcome, <?= $user->getUsername(); ?></h2>

    <?php if($user->getProfilePictureUrl() == null): ?>
        <h2>No profile Picture</h2>
    <?php else: ?>
        <img src="/oop_forum/<?= $user->getProfilePictureUrl(); ?>" alt="">
    <?php endif; ?>

    <a href="edit_profile.php">Edit your profile</a>
</body>
</html>