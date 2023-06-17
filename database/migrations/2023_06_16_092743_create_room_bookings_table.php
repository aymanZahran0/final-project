<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedInteger('tourist_id');
            $table->foreign('tourist_id')->references('id')->on('tourists')->onDelete('cascade');
            $table->string('type');
            $table->date('check_in');
            $table->date('check_out');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_bookings');
    }
};
