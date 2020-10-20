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

    public function getByUsername(string $username): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users WHERE username = ?")->execute([$username])->fetch();
        $user = $user->current();
        return new UserDTO($user['id'], $user['username'], $user['password'], '');
    }

    public function getById(int $id): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users WHERE id = ?")->execute([$id])->fetch();
        $user = $user->current();
        return new UserDTO($user['id'], $user['username'], $user['password'], '');
    }
}