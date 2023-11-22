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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('transaction_id')->primary();
            $table->string('status');
            $table->string('buyer_name' , 100);
            $table->string('buyer_email');
            $table->string('buyer_phone');
            $table->string('reference_id');
            $table->decimal('amount' , 10 , 2 ,true);
            $table->decimal('fee' , 8 , 2 ,true);
            $table->decimal('total' , 10 , 2 ,true);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
