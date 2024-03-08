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
        Schema::create('rates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('from_id');
            $table->uuid('to_id');
            $table->decimal('rate', 10, 4);
            $table->timestamps();

            $table->foreign('from_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('to_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->unique(['from_id', 'to_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
