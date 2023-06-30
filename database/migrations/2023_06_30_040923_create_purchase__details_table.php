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
        Schema::create('purchase__details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('date');
            $table->string('supplier_id');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('grand_total');
            $table->string('payable_amount');
            $table->string('payment_mode');
            $table->string('status')->default(1);

 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase__details');
    }
};
