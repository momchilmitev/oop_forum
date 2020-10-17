<?php

namespace Repositories\Users;

use UserDTO;

interface UserRepositoryInterface
{
    public function getAll(): \Generator;

    public function register(UserDTO $userDTO);
}