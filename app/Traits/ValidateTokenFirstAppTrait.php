<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

trait ValidateTokenFirstAppTrait
{    
    /**
     * validateTokenWithFirstApp
     * 
     * Validate the user token from the first App
     *
     * @param  string $token
     * @param  Request $request
     * @return bool|array
     */
    public static function validate(string $token, Request $request): bool|array
    {
        try {
            $response = 
                Http::timeout(5)->get(config('firstapp.api_url'), [
                    'token' => $token
                ]);
                
                //var_dump($response->body());
                
               $request->merge(['user' => $response->body('user')]);

            if ($response->successful()) {
                $data = $response->json();

                return $data['valid'] ?? false;
            }

            // Log the error if the validation endpoint returns an error status
            Log::error('Token validation failed with status code: ' . $response->status());

        } catch (\Exception $e) {
            // Log any exceptions during the token validation process
            Log::error('Token validation failed: ' . $e->getMessage());
        }

        return false;
    }
}
