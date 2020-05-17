<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookno');
            $table->string('userid');
            $table->bigInteger('room_id')->nullable()->unsigned(); 
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');;
            $table->bigInteger('roomtype_id')->unsigned();
            $table->foreign('roomtype_id')->references('id')->on('roomtypes');
            $table->string('status'); 
            $table->date('check_in'); 
            $table->date('check_out'); 
            $table->integer('total'); 
            $table->bigInteger('discount_id')->nullable()->unsigned();
            $table->foreign('discount_id')->references('id')->on('roomdiscounts');
            $table->integer('final_price'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
