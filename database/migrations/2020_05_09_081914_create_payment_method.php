<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethod', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentAmount'); 
            $table->date('paymentDate'); 
            $table->integer('card_number');
            $table->string('card_holdername'); 
            $table->integer('amount'); 
            $table->string('description'); 
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
        Schema::dropIfExists('payment_method');
    }
}

