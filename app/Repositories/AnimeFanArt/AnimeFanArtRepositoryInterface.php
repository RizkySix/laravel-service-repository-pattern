<?php

namespace App\Repositories\AnimeFanArt;

use Illuminate\Database\Eloquent\Collection;

interface AnimeFanArtRepositoryInterface
{
    public function getAllData() : Collection;
    public function searchDataByName(string $name) :  Collection;
}