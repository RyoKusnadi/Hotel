<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function ($table){
            $table->id();
            $table->string('roomNo'); 
            $table->bigInteger('roomtype_id')->unsigned();
            $table->foreign('roomtype_id')->references('id')->on('roomtypes');
            $table->string('floor');
            $table->integer('beds'); 
            $table->integer('status')->default(0); 
            $table->string('roomPicture')->nullable(); 
            $table->integer('maxCapacity');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
