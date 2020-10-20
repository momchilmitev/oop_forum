<?php

namespace Services\Users;

use Data\Users\UserDTO;

interface UserServiceInterface
{
    /**
     * @param UserDTO $userDTO
     * @throws Exception
     * @return mixed
     */
    public function register(UserDTO $userDTO);

    public function verifyCredentials(string $username, string $password): bool;

    public function findByUsername(string $username): UserDTO;

    public function findBiId(int $id): UserDTO;
}