<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): AuthResource
    {
        return AuthResource::make($request->persist());
    }

    public function login(LoginRequest $request): AuthResource
    {
        return AuthResource::make($request->persist());
    }

    public function logout(LogoutRequest $request): JsonResponse
    {
        $request->persist();

        return response()->json('User LoggedOut Successfully');
    }

    public function user(): UserResource
    {
        return UserResource::make(auth()->user());
    }
}
