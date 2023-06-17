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
        Schema::create('garcia_restaurant_cafe_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->default('12');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('Number_of_persons');
            // $table->time('Time');
            // $table->date('Date');
            $table->longtext('Message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garcia_restaurant_cafe_bookings');
    }
};
