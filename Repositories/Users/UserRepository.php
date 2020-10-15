<?php

namespace Repositories\Users;

use Database\DatabaseInterface;

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
}