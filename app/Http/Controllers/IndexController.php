<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataRequest;
use App\Contracts\UserServiceInterface;
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
        protected UserServiceInterface $userService
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

        // var_dump($userData);

        // die();

        // Try to update the current user or create a new user
        try {
            $this->userService->createOrUpdateUser($userData);
        } catch (\Exception $e) {
            Log::error("Error in IndexController::index createOrUpdateUser failed");
        }

        return Inertia::render('User/Index');        
    }
}
