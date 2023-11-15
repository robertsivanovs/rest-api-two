<?php

namespace App\Contracts;

interface TransactionServiceInterface
{    
    /**
     * createOrUpdateTransaction
     *
     * @param  array $userData
     * @return bool
     */
    public function createOrUpdateTransaction(array $userData): bool;
}
