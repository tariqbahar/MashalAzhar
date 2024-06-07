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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('workername')->nullable();
            $table->string('typeofproduct')->nullable();
            $table->integer('unitprice')->nullable();
            $table->integer('workbybox')->nullable();
            $table->integer('pymentbyfactory')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('totalprice')->nullable();
            $table->integer('debate')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
