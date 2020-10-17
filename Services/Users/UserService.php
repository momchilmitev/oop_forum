<?php

namespace Services\Users;

use Data\Users\UserDTO;
use Repositories\Users\UserRepositoryInterface;
use Services\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{
    const MIN_USERNAME_LENGTH = 5;

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
}