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
        Schema::create('add_costs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('types');
            $table->string('details');
            $table->integer('quantity');
            $table->integer('cost');
            $table->integer('totalcost');
            $table->integer('pyment')->nullable();
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
        Schema::dropIfExists('add_costs');
    }
};
