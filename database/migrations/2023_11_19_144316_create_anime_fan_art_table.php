<?php

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
        Schema::create('anime_fan_art', function (Blueprint $table) {
            $table->id();
            $table->string('character_name' , 50);
            $table->string('complete_file');
            $table->decimal('price' , 10 , 2 , true);
            $table->integer('like' , false , true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_fan_art');
    }
};
