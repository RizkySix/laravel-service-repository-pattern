<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class AnimeFanArt extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'anime_categories' , 'anime_fan_art_id' , 'category_id')->withPivot('created_by');
    }


    public function image() : MorphMany
    {
        return $this->morphMany(Image::class , 'imageable');
    }
}
