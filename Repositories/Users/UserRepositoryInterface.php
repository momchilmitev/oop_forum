<?php

namespace Repositories\Users;

interface UserRepositoryInterface
{
    public function getAll(): \Generator;
}