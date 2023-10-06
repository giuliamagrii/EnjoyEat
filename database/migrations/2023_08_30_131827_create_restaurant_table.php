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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('street');
            $table->string('city');
            $table->string('postalcode');
            $table->string('country');
            $table->text('description');
            $table->string('averageprice');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owner');
            $table->integer('food_id')->unsigned();
            $table->foreign('food_id')->references('id')->on('food');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
