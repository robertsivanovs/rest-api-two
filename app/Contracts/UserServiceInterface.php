<?php

namespace App\Contracts;

interface UserServiceInterface
{    
    /**
     * createOrUpdateUser
     *
     * @param  array $userData
     * @return bool
     */
    public function createOrUpdateUser(array $userData): bool;
}
