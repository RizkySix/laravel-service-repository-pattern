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

    /**
     * Hande get with categories
     */
    public function getAllDataWithCategories(): Collection
    {
        return $this->model->with(['categories:category_name'])->latest()->get();
    }

    /**
     * Handle store fan art
     */
    public function storeFanArt(array $data, array $categories) : AnimeFanArt
    {
        $instace = $this->model->create($data);
        
        $instace->categories()->attach($categories['categories'] , ['created_by' => rand(1,10)]);

        return $instace;
    }


    /**
     * Handle update categoires
     */
    public function updateCategories(AnimeFanArt $instace,  array $newCategories)
    {
      
        $instace->categories()->sync($newCategories);
    }
}
