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
            $table->foreignId('flatSale_id');
            $table->string('payment_type');
            $table->decimal('amount');
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->integer('account_number')->nullable();
            $table->integer('check_number')->nullable();

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
