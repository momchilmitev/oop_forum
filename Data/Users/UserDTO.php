<?php

namespace Data\Users;

class UserDTO
{
    private int $id;

    private string $username;

    private string $password;

    private string $confirmPassword;

    private string $profilePictureUrl;

    /**
     * UserDTO constructor.
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $confirmPassword
     * @param string $profilePictureUrl
     */
    public function __construct(int $id, string $username, string $password, string $confirmPassword, string $profilePictureUrl)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->profilePictureUrl = $profilePictureUrl;
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    /**
     * @param string $confirmPassword
     */
    public function setConfirmPassword(string $confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * @return string
     */
    public function getProfilePictureUrl(): string
    {
        return $this->profilePictureUrl;
    }

    /**
     * @param string $profilePictureUrl
     */
    public function setProfilePictureUrl(string $profilePictureUrl): void
    {
        $this->profilePictureUrl = $profilePictureUrl;
    }


}