<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomDiscounts extends Model
{
    protected $table = 'roomdiscounts';
    protected $guarded = [];
    protected $fillable = ['name','value','usedcount','description','validdate','validuntil','isvalid'];
}
