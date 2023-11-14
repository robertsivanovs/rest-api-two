<?php

declare (strict_types=1);
namespace App\Services;

use App\Models\User;
use App\Models\UserTransaction;
use App\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

/**
 * UserService
 */
class UserService implements UserServiceInterface
{    
    /**
     * createOrUpdateUser
     *
     * @param  array $userData
     * @return bool
     */
    public function createOrUpdateUser(array $userData): bool
    {
        // Update the user or Create a new user if it does not exist
        $user = User::updateOrCreate(
            [
                'first_app_user_id' => $userData['valid']['user_id']], // Use the user ID as the unique identifier
            [
                'name' => $userData['valid']['user_name'],
                'email' => $userData['valid']['user_email'],
                'coin_balance' => $userData['valid']['user_coin_balance'],
                'first_app_user_id' => $userData['valid']['user_id'],
                'last_login_at' => $userData['valid']['last_login_at']
                // Add more fields as needed
            ]
        );

        // Update or create user coin transactions
        if (count($userData['valid']['transaction_history']) > 0) {
            $transHistory = $userData['valid']['transaction_history'];

            foreach ($transHistory as $transaction) {
                // Record the transaction
                UserTransaction::updateOrCreate(
                    [
                        'first_app_id' => $transaction['id']
                    ],
                    [
                        'user_id' => $transaction['user_id'],
                        'amount' => $transaction['amount'],
                        'first_app_id' => $transaction['id']
                    ]
                );
            }
        }

        // Check if the updated/created user exists
        if ($user->exists) {
            // Log the user in if user was successfully created/updated
            Auth::login($user);
            return true;
        } else {
            // Throw an exception if the update/create action failed
            throw new \Exception("Error in: createOrUpdateUser user Update/Save failed");
            return false;
        }
            
    }
}
