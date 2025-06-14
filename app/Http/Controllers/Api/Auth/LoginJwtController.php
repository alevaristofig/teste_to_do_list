<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Api\ApiMessages;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class LoginJwtController extends Controller
{        
    public function login(Request $request): JsonResponse
    {               
        $credentials = $request->all(['email', 'password']);

        Validator::make($credentials, [
            'email' => 'required|string',
            'password' => 'required|string'
        ])->validate();

        if(!$token = auth('api')->attempt($credentials))
        {
            $message = new ApiMessages('Unauthorized');
            return response()->json(['error' => $message->getMessage()], 401); 
        }

        return response()->json([
            'token' =>$token
        ]);
    }

    public function logout(): JsonResponse
    {
        dd(phpinfo());
        auth('api')->logout();

        return response()->json([
            'message' => 'Logout successfully!', 200
        ]);
    }

    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json([
            'token' =>$token
        ]);
    }
}
