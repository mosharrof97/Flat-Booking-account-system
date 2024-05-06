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
        Schema::create('invest_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id');
            $table->string('payment_type');
            $table->decimal('installment_amount',15,2);
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->bigInteger('check_number')->nullable();

            $table->foreignId('received_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invest_installments');
    }
};
