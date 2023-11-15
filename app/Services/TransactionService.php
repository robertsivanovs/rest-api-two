<?php

declare (strict_types=1);
namespace App\Services;

use App\Contracts\TransactionServiceInterface;
use App\Models\UserTransaction;

/**
 * TransactionService
 */
class TransactionService implements TransactionServiceInterface

{    
    /**
     * createOrUpdateTransaction
     *
     * @param  array $userData
     * @return bool
     */
    public function createOrUpdateTransaction(array $userData): bool
    {
        if (!isset($userData['valid']['transaction_history'])) {
            throw new \Exception("Error in: createOrUpdateTransaction no user transactions!");
            return false;
        }

        // Update or create user coin transactions
        if (count($userData['valid']['transaction_history']) > 0) {
            $transHistory = $userData['valid']['transaction_history'];

            foreach ($transHistory as $transaction) {
                // Record the transaction
                UserTransaction::updateOrCreate(
                    [
                        // Avoid spoofing new transaction records
                        'first_app_id' => $transaction['id']
                    ],
                    [
                        'user_id' => $userData['valid']['user_id'],
                        'amount' => $transaction['amount'],
                        'first_app_id' => $transaction['id']
                    ]
                );
            }
            return true;
        }
    }
}
