<?php

namespace App\Repositories\AnimeFanArt;

use App\Models\AnimeFanArt;
use Illuminate\Database\Eloquent\Collection;

interface AnimeFanArtRepositoryInterface
{
    public function getAllData() : Collection;
    public function searchDataByName(string $name) :  Collection;
    public function getAllDataWithCategories() :  Collection;
    public function storeFanArt(array $data, array $categories) : AnimeFanArt;
    public function updateCategories(AnimeFanArt $instace, array $newCategories);
}