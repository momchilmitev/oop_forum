<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register Form</h1>
    <div>
        <h2><?= $error; ?></h2>
    </div>
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        Confirm: <input type="password" name="confirm"><br>
        <input type="submit" name="register" value="Register"><br>
    </form>
</body>
</html>
