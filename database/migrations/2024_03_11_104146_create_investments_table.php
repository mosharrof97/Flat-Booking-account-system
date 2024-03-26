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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('investor_id');
            $table->foreignId('project_id');
            $table->decimal('total_Investment',15,2);
            $table->string('installment_type');
            $table->string('profit_type');
            $table->string('profit');
            $table->rememberToken();
            $table->timestamps();
        });
    }
//$table->foreignId('investor_id')->constrained('investors');
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};