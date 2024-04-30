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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flat_id');
            $table->foreignId('flatSale_id');
            $table->string('payment_type');
            $table->decimal('amount',15,2);
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->integer('account_number',20)->nullable();
            $table->integer('check_number',20)->nullable();

            $table->bigInteger('status')->default(0);
            $table->foreignId('received_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
