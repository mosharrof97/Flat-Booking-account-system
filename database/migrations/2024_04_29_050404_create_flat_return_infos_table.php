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
            $table->decimal('buying_price');
            $table->decimal('return_price');
            $table->bigInteger('status')->default(0);
            $table->foreignId('sold_by');
            $table->foreignId('booking_by');
            $table->foreignId('return_by');
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
