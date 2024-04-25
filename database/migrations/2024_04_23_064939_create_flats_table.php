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
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('project_id');
            $table->foreignId('client_id')->nullable();
            $table->string('name');
            $table->integer('flat_area');
            $table->decimal('price',15,2);
            $table->integer('room');
            $table->integer('dining_space')->nullable();
            $table->integer('bath_room');
            $table->string('parking')->nullable();
            $table->string('outdoor')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('active_status')->default(0);
            $table->integer('sale_status')->default(0);
            $table->integer('status')->default(0);

            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
