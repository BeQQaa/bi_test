<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyDestroyRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public final function index(int $limit = 5): JsonResponse
    {
        $companyModel = Company::select(explode(',', config("constants.USER_INDEX_SELECT")))
            ->simplePaginate($limit);

        return new JsonResponse($companyModel, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public final function store(CompanyStoreRequest $request): JsonResponse
    {
        $companyModel = Company::create($request->validated());

        return new JsonResponse($companyModel, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $companyModel = Company::with('users')->find($id);

        return new JsonResponse($companyModel, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public final function update(CompanyUpdateRequest $request, string $id): JsonResponse
    {
        $validated = $request->validated();
        unset($validated['image']);
        $status = Company::where('id', $id)->update($validated);

        $queries = DB::getQueryLog();
        return new JsonResponse($status, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public final function destroy(CompanyDestroyRequest $request, string $id)
    {
        Company::find($id)->delete();

        return new JsonResponse(config('constants.DELETED'), Response::HTTP_ACCEPTED);

    }
}
