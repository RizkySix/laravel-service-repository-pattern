<?php

namespace App\Services\AnimeFanArt;

use Exception;
use Illuminate\Database\Eloquent\Collection;

interface AnimeFanArtServiceInterface
{
    public function getAllData() : Collection|Exception;
    public function searchDataByName(string $name) :  Collection|Exception;

}