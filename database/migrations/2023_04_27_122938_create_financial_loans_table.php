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
        Schema::create('financial_loans', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->unique();
            $table->decimal('loan_amount', 16, 2);
            $table->decimal('added_tax', 12, 2);
            $table->smallInteger('number_of_months');
            $table->smallInteger('number_of_payments_paid')->default('0');
            $table->decimal('monthly_payment', 14, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_loans');
    }
};
