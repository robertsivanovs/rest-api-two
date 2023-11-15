<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataRequest;
use App\Contracts\UserServiceInterface;
use App\Contracts\TransactionServiceInterface;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

/**
 * IndexController
 */
class IndexController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected UserServiceInterface $userService,
        protected TransactionServiceInterface $transactionService
    ) {}
    
    /**
     * index
     * 
     * Log the user in to the second app
     *
     * @param  mixed $request
     * @return void
     */
    public function index(UserDataRequest $request)
    {
        $userData = json_decode($request->validated('user'), true);
        $transactionData = [];

        // Try to update the current user or create a new user
        try {
            $user = $this->userService->createOrUpdateUser($userData);
        } catch (\Exception $e) {
            Log::error("Error in IndexController::index createOrUpdateUser failed:" . $e->getMessage());
        }

        // Try to update user coin transactions
        try {
            $userHasTransactions = $this->transactionService->createOrUpdateTransaction($userData);
        } catch (\Exception $e) {
            Log::error("Error in IndexController::index createOrUpdateTransaction failed:" . $e->getMessage());
        }

        if ($userHasTransactions) {
            // Extract the user transaction data
            $transactionData = $userData['valid']['transaction_history'];
        }

        if ($user->exists) {
            Auth::login($user);
        }

        return Inertia::render('User/Index', [
            'transactionData' => $transactionData
            ]
        );
        
    }
}
