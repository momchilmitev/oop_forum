<?php

spl_autoload_register(function($className) {
    require_once $className . '.php';
});

$pdo = new PDO("mysql:dbname=forum;host=localhost", "root", "M8708013025");
$db = new PDODatabase($pdo);

function getUsers(DatabaseInterface $db)
{
    foreach ($db->query("SELECT * FROM users")->execute()->fetch() as $user) {
        var_dump($user);
    }
}

getUsers($db);