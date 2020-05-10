<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    protected $table = 'paymentmethods';
    protected $guarded = [];
    protected $fillable = ['paymentAmount','paymentDate','card_number','card_holdername','amount','description'];
}
