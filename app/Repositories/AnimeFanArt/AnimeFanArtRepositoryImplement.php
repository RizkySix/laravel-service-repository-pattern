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
    public function storeFanArt(array $data, array $categories) 
    { 
        $anime = $this->model->create([
            'character_name' => $data['character_name'],
            'complete_file' => $data['complete_file'],
        ]);
        
        foreach($data['preview_image'] as $data){
            $anime->image()->create($data);
        }

        $anime->categories()->attach($categories['categories'] , ['created_by' => rand(1,10)]);

        return $anime;
    }


    /**
     * Handle update categoires
     */
    public function updateCategories(AnimeFanArt $anime,  array $newCategories)
    {
      
        return $anime->categories()->sync($newCategories);
    }


    /**
     * Delete fan art
     */
    public function deleteFanArt(AnimeFanArt $anime)
    {
        $anime->categories()->detach();
        $anime->delete();

        return $anime;
    }
}
