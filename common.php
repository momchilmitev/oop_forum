<?php

session_start();
spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});

$pdo = new \PDO("mysql:dbname=forum;host=localhost", "root");
$db = new Database\PDODatabase($pdo);
//$userRepo = new Repositories\Users\UserRepository($db);
//
//
//foreach ($userRepo->getAll() as $user) {
//    echo  $user['username'] . PHP_EOL;
//}


