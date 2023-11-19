<?php

namespace App\Repositories\AnimeFanArt;

use App\Models\AnimeFanArt;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class AnimeFanArtRepositoryImplement implements AnimeFanArtRepositoryInterface
{
    protected $model;

    /**
     * Model depedency injection
     */
    public function __construct(AnimeFanArt $animeFanArt)
    {
        $this->model = $animeFanArt;
    }

    /**
     * Handle get all data
     */
    public function getAllData() : Collection
    {
        return $this->model->latest()->get();
    }

    /**
     * Handle search data
     */
    public function searchDataByName(string $name): Collection
    {
        return $this->model->where('character_name' , 'like' , '%' . $name . '%')->latest()->get();
    }
}
