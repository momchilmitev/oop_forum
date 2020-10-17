<?php

namespace Repositories\Users;

use Database\DatabaseInterface;
use Data\Users\UserDTO;

class UserRepository implements UserRepositoryInterface
{
    private DatabaseInterface $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function getAll(): \Generator
    {
        return $this->db->query("SELECt * FROM users")->execute()->fetch();
    }

    public function register(UserDTO $userDTO)
    {
        $this->db->query("INSERT INTO users (username, password) VALUES (?, ?)")
                    ->execute([$userDTO->getUsername(), $userDTO->getPassword()]);
    }
}