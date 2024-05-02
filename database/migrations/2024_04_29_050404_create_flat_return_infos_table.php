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
        Schema::create('flat_return_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flat_id');
            $table->foreignId('client_id');
            $table->decimal('buying_price',15,2);
            $table->decimal('pay_amount',15,2);
            $table->decimal('return_price',15,2);
            $table->bigInteger('status')->default(0);
            $table->foreignId('sold_by')->nullable();
            $table->foreignId('booking_by')->nullable();
            $table->foreignId('return_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flat_return_infos');
    }
};
