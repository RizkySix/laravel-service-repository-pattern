<?php

namespace App\Http\Controllers;

use App\Repositories\AnimeFanArt\AnimeFanArtRepositoryInterface;
use App\Services\AnimeFanArt\AnimeFanArtServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimeFanArtController extends Controller
{
    private $repository;

    public function __construct(AnimeFanArtServiceInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all method
     */
    public function throwAll() : JsonResponse
    {
        $result = $this->repository->getAllData();

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
        $result = $this->repository->searchDataByName($request->name);
        return response()->json([
            'status' => true,
            'data' => $result
        ], 200);

    }
}
