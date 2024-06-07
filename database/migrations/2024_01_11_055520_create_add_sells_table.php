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
        Schema::create('add_sells', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_name');
            $table->string('detaile');
            $table->string('product_type');
            $table->string('weight');
            $table->integer('unit_price');           
            $table->integer('pyment');  
            $table->integer('totalprice')->nullable();
            $table->integer('debate')->nullable();
            $table->string('datetime');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sells');
    }
};
