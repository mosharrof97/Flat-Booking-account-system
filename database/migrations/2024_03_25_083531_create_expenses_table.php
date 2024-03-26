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
            $table->foreignId('user_id')->nullable();
            $table->foreignId('project_id');
            $table->date('data');
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
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
