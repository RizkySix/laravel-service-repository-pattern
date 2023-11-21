<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimeFanArtRequest;
use App\Http\Requests\UpdateFanArtCategoriesRequest;
use App\Models\AnimeFanArt;
use App\Repositories\AnimeFanArt\AnimeFanArtRepositoryInterface;
use App\Services\AnimeFanArt\AnimeFanArtServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimeFanArtController extends Controller
{
    private $service;

    public function __construct(AnimeFanArtServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Get all method
     */
    public function throwAll() : JsonResponse
    {
        $result = $this->service->getAllData();

        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);
    }


    /**
     * Search anime art
     */
    public function searchAnimeByName(Request $request) : JsonResponse
    {
        $result = $this->service->searchDataByName($request->name);
        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);

    }


    /**
     * Get all with categories
     */
    public function throwAllWithCategories() : JsonResponse
    {
        $result = $this->service->getAllDataWithCategories();

        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);
    }


    /**
     * Store anime fan art
     */
    public function store(StoreAnimeFanArtRequest $request) 
    {
        $validatedData = $request->validated();

        $result = $this->service->storeFanArt($validatedData);

        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);
    }


    /**
     * update anime fan art
     */
    public function update(AnimeFanArt $anime , UpdateFanArtCategoriesRequest $request) 
    {
        $validatedData = $request->validated();

        $result = $this->service->updateCategories($anime , $validatedData);

        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);
    }


    /**
     * Deltee fan art
     */
    public function delete(AnimeFanArt $anime)
    {
        $result = $this->service->deleteFanArt($anime);

        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);
    }
}

