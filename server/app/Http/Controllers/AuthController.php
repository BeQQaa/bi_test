<?php

namespace App\Http\Controllers;

use App\Exceptions\WrongPasswordException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public final function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $token = $user->createToken('web_token')->plainTextToken;

        return new JsonResponse(['token' => $token], ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws WrongPasswordException
     */
    public final function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->validated())->first();
        $credentials = $request->validated('password');
        User::attempt($credentials, $user->password);

        $token = $user->createToken('web_token')->plainTextToken;

        return new JsonResponse(['token' => $token], ResponseAlias::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public final function logOut(): JsonResponse
    {

        Auth::user()->currentAccessToken()->delete();

        return new JsonResponse(['message' => 'Logged out'], ResponseAlias::HTTP_OK);
    }
}
