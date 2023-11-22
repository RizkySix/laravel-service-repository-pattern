<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
        $animes = \App\Models\AnimeFanArt::factory(10)->create();
         \App\Models\Category::factory(10)->create();


         $animes->each(function($anime) {
            $pivotData = [];
            $range = range(1, 10);
            shuffle($range);
            for($i = 0; $i < 5; $i++){
                $pivotData[] = [
                    'anime_fan_art_id' => $anime->id,
                    'category_id' => $range[$i],
                    'created_by' => rand(1,10)
                ];
            }

            DB::table('anime_categories')->insert($pivotData);
            
            for($i = 0; $i < 3; $i++){
                $anime->image()->create([
                    'path' => fake()->url(),
                    'short_description' => fake()->name()
                ]);
            }
         });
    }
}
