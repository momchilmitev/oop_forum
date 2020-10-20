<?php

namespace Data\Users;

class UserEditDTO
{
    private int $id;

    private string $username;

    private string $oldPassword;

    private string $newPassword;

    /**
     * UserEditDTO constructor.
     * @param int $id
     * @param string $username
     * @param string $oldPassword
     * @param string $newPassword
     */
    public function __construct(int $id, string $username, string $oldPassword, string $newPassword)
    {
        $this->id = $id;
        $this->username = $username;
        $this->oldPassword = $oldPassword;
        $this->newPassword = $newPassword;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    /**
     * @param string $oldPassword
     */
    public function setOldPassword(string $oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return string
     */
    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    /**
     * @param string $newPassword
     */
    public function setNewPassword(string $newPassword): void
    {
        $this->newPassword = $newPassword;
    }


}