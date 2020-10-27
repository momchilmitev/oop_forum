<?php

namespace Services\Users;

use Data\Users\UserDTO;
use Data\Users\UserEditDTO;

interface UserServiceInterface
{
    /**
     * @param UserDTO $userDTO
     * @throws \Exception
     * @return mixed
     */
    public function register(UserDTO $userDTO);

    /**
     * @param int $id
     * @param UserEditDTO $userEditDTO
     * @throws \Exception
     */
    public function edit(int $id, UserEditDTO $userEditDTO): void;

    public function verifyCredentials(string $username, string $password): bool;

    public function findByUsername(string $username): UserDTO;

    public function findBiId(int $id): UserDTO;

    /**
     * @param int $id
     * @param string $tempName
     * @param string $type
     * @param int $size
     * @throws \Exception;
     * @return mixed
     */
    public function setProfilePicture(int $id, string $tempName, string $type, int $size);
}