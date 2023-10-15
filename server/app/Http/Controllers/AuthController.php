<?php

namespace App\Http\Controllers;

use App\Exceptions\WrongPasswordException;
use App\Http\Requests\LoginRequest;
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

        $token = User::roleType($request->validated(config('constants.ROLE_NAME')), $user);

        return new JsonResponse([config('constants.USER_TOKEN_NAME') => $token], ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws WrongPasswordException
     */
    public final function login(LoginRequest $request): JsonResponse
    {
        $user = User::where(config('constants.USER_EMAIL'), $request->validated())->first();
        $credentials = $request->validated(config('constants.USER_PASSWORD'));
        User::attempt($credentials, $user->password);

        $token = User::roleType($user->role, $user);

        return new JsonResponse([config('responses.types.TOKEN') => $token], ResponseAlias::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public final function logOut(): JsonResponse
    {

        Auth::user()->currentAccessToken()->delete();

        return new JsonResponse(config('responses.LOGOUT'), ResponseAlias::HTTP_OK);
    }
}
