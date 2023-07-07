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
        Schema::create('sales__details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('date')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();

            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('payable_amount')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales__details');
    }
};
