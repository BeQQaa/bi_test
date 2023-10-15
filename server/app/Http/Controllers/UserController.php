<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * @param int $limit
     * @return JsonResponse
     */
    public final function index(int $limit = 5): JsonResponse
    {
        $userModels = User::select(explode(',', config("constants.USER_INDEX_SELECT")))
            ->simplePaginate($limit);

        return new JsonResponse($userModels);
    }

    /**
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public final function store(UserStoreRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        return new JsonResponse($user, Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public final function show(string $id): JsonResponse
    {
        $userModel = User::find($id);
        return new JsonResponse($userModel, Response::HTTP_OK);
    }

    /**
     * @param UserUpdateRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public final function update(UserUpdateRequest $request, string $id): JsonResponse
    {
        $status = User::where(config('constants.COLUMN_ID'), $id)->update($request->validated());

        return new JsonResponse($status, Response::HTTP_ACCEPTED);
    }

    /**
     * @param UserDestroyRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public final function destroy(UserDestroyRequest $request, string $id): JsonResponse
    {
//        check permissions
        User::find($id)->delete();

        return new JsonResponse(config('constants.DELETED'), Response::HTTP_ACCEPTED);
    }
}
