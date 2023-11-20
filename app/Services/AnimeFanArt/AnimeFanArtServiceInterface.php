<?php

namespace App\Services\AnimeFanArt;

use App\Models\AnimeFanArt;
use Exception;
use Illuminate\Database\Eloquent\Collection;

interface AnimeFanArtServiceInterface
{
    public function getAllData() : Collection|Exception;
    public function searchDataByName(string $name) :  Collection|Exception;
    public function getAllDataWithCategories() :  Collection|Exception;
    public function storeFanArt(array $data) : AnimeFanArt|Exception;
    public function updateCategories(AnimeFanArt $instace, array $newCategories);

}