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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('projectName');
            $table->decimal('budget',15,2);
            $table->integer('land_area');
            $table->string('duration');
            $table->integer('floor');
            $table->integer('flat');
            $table->integer('flat_area');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('address');
            $table->string('city');
            $table->foreignId('district_id');
            $table->integer('zipCode');
            $table->string('image');
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
