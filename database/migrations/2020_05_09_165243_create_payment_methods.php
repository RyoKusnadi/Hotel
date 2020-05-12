<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->integer('book_Id'); 
            $table->integer('paymentAmount'); 
            $table->date('paymentDate'); 
            $table->string('payment_categories');
            $table->integer('card_number')->nullable();
            $table->string('card_holdername')->nullable(); ; 
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
        Schema::dropIfExists('payment_methods');
    }
}
