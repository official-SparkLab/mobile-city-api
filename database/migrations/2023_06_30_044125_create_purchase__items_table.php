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
        Schema::create('purchase__items', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('brand')->nullable();
            $table->string('model_name')->nullable();
            $table->string('imei')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('total')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase__items');
    }
};
