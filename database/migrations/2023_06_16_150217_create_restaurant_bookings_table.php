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
        Schema::create('restaurant_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tourist_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->integer('people_count');
            $table->date('booking_date');
            $table->timestamps();

            $table->foreign('tourist_id')->references('id')->on('tourists')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_bookings');
    }
};
