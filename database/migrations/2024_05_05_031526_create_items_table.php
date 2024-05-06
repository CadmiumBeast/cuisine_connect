<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default('0');
            $table->unsignedBigInteger('restaurant_id')->default('0');
            $table->string('name');
            $table->smallInteger('price');
            $table->text('picture');
            $table->boolean('Availability')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
