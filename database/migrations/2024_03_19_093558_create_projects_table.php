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
            $table->string('projectName');
            $table->decimal('budget',15,2);
            $table->integer('land_area');
            $table->string('front_road',100)->nullable();
            $table->string('property_type')->nullable();
            $table->string('floor');
            $table->string('comm_space_size')->nullable();
            $table->string('num_of_basement')->nullable();
            $table->integer('flat');
            $table->string('duration',50);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('address');
            $table->string('city');
            $table->foreignId('district_id');
            $table->integer('zipCode');
            $table->string('image');
            $table->integer('status')->default(0);
            $table->integer('active_status')->default(0);

            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
