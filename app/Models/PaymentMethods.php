<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    protected $table = 'paymentmethods';
    protected $guarded = [];
    protected $fillable = ['book_Id','paymentAmount','paymentDate','payment_categories','card_number','card_holdername','remarks'];
}
