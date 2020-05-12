<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomdiscounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('value');
            $table->integer('usedcount')->default(0);
            $table->string('description')->nullable();; 
            $table->date('valid_date'); 
            $table->date('valid_until'); 
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
        Schema::dropIfExists('room_discounts');
    }
}
