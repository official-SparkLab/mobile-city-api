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
        Schema::create('purchase_payables', function (Blueprint $table) {
            $table->id();
            $table->String("date")->nullable();
            
            $table->String("supplier_name")->nullable();

            $table->String("mobile_no")->nullable();

            $table->String("address")->nullable();

            $table->String("pending_amount")->nullable();

            $table->String("paid_amount")->nullable();

            $table->String("available_balance")->nullable();

            $table->String("payment_mode")->nullable();

            $table->String("trx_no")->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payables');
    }
};
