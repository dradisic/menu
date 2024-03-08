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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('currency_code', 3);
            $table->decimal('exchange_rate', 10, 6);
            $table->tinyInteger('surcharge_percentage');
            $table->decimal('amount_surcharge', 8, 2);
            $table->decimal('amount_foreign_currency', 10, 2);
            $table->decimal('amount_paid', 10, 2);
            $table->tinyInteger('discount_percentage')->nullable();
            $table->decimal('discount_amount', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
