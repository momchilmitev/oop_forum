<?php

namespace Repositories\Users;

use Data\Users\UserDTO;

interface UserRepositoryInterface
{
    public function getAll(): \Generator;

    public function register(UserDTO $userDTO);
}