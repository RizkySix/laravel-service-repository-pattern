<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;


    public function animes()
    {
        return $this->belongsToMany(AnimeFanArt::class , 'anime_categories' , 'category_id' , 'anime_fan_art_id')->withPivot('created_by');
    }
    
    /**
     * Accesor
     */
    protected function categoryName() : Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value)
        );
    }
}
