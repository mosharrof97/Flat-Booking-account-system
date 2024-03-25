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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->date('data');
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit',40)->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->decimal('total_price',15,2)->nullable();
            $table->decimal('total',15,2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
