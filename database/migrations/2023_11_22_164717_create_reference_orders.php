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
        Schema::create('reference_orders', function (Blueprint $table) {
            $table->string('reference_id')->primary();
            $table->foreign('reference_id')->references('transaction_id')->on('orders');
            $table->string('via' , 25);
            $table->string('channel' , 25);
            $table->string('payment_code' , 100);
            $table->timestamp('expired_at');
            $table->string('type')->default('buying');
            $table->string('message' , 100);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_orders');
    }
};
