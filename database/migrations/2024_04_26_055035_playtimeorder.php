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
        //
        Schema::create('playtimeorder', function (Blueprint $table) {
            $table->id();
            $table->time('intime');
            $table->time('outtime');
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('child')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoice')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('playtimeorder');
    }
};
