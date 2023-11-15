<?php

namespace App\Contracts;

interface UserServiceInterface
{    
    /**
     * createOrUpdateUser
     *
     * @param  array $userData
     * @return User
     */
    public function createOrUpdateUser(array $userData): \App\Models\User;
}
