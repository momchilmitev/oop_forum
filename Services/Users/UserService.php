<?php

namespace Services\Users;

use Data\Users\UserDTO;
use Repositories\Users\UserRepositoryInterface;
use Services\Encryption\EncryptionServiceInterface;
use Data\Users\UserEditDTO;

class UserService implements UserServiceInterface
{
    const MIN_USERNAME_LENGTH = 5;
    const MAX_ALLOWED_IMAGE_SIZE = 30000;
    const ALLOWED_IMAGE_PREFIX = 'image/';

    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private EncryptionServiceInterface $encryptionService;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     * @param EncryptionServiceInterface $encryptionService
     */
    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    /**
     * @param UserDTO $userDTO
     * @throws \Exception
     */
    public function register(UserDTO $userDTO)
    {
        if ($userDTO->getPassword() != $userDTO->getConfirmPassword()) {
            throw new \Exception("Password mismatch!");
        }

        if (strlen($userDTO->getUsername()) < self::MIN_USERNAME_LENGTH) {
            throw new \Exception("Username must be longer!");
        }

        $passwordHash = $this->encryptionService->hash($userDTO->getPassword());
        $userDTO->setPassword($passwordHash);

        $this->userRepository->register($userDTO);
    }

    public function verifyCredentials(string $username, string $password): bool
    {
        $user = $this->userRepository->getByUsername($username);

        return $this->encryptionService->verify($password, $user->getPassword());
    }

    public function findByUsername(string $username): UserDTO
    {
        return $this->userRepository->getByUsername($username);
    }

    public function findBiId(int $id): UserDTO
    {
        return $this->userRepository->getById($id);
    }

    public function edit(int $id, UserEditDTO $userEditDTO): void
    {
        $user = $this->userRepository->getById($id);
        $changePassword = false;

        if ($userEditDTO->getOldPassword() && $userEditDTO->getNewPassword()) {
            if (!$this->verifyCredentials($user->getUsername(), $userEditDTO->getOldPassword())) {
                throw new \Exception("Password mismatch!");
            }

            $changePassword = true;
        }

        if ($changePassword) {
            $userEditDTO->setNewPassword(
                $this->encryptionService->hash($userEditDTO->getNewPassword())
            );
        }

        $this->userRepository->edit($id, $userEditDTO, $changePassword);
    }

    public function setProfilePicture(int $id, string $tempName, string $type, int $size)
    {

        if (strpos($type, self::ALLOWED_IMAGE_PREFIX) === false) {
            throw new \Exception("Invalid image type!");
        }

        if ($size >= self::MAX_ALLOWED_IMAGE_SIZE) {
            throw new \Exception("Image too big!");
        }

        $filePath = 'public/images/' . uniqid('profile_') . '.' . explode('/', $type)[1];

        if (!move_uploaded_file($tempName, $filePath)) {
            throw new \Exception("Error uploading file!");
        }

        $this->userRepository->setPictureUrl($id, $filePath);
    }
}