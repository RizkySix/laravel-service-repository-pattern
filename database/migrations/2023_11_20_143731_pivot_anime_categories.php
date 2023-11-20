<?php

use App\Models\AnimeFanArt;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anime_categories', function (Blueprint $table) {
            $table->foreignIdFor(AnimeFanArt::class);
            $table->foreignIdFor(Category::class);
            $table->integer('created_by' , false, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_categories');
    }
};
