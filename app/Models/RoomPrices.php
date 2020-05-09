<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;

class RoomPrices extends Model
{
    protected $table = 'roomprices';
    protected $guarded = [];
    protected $fillable = ['roomtype_id','price'];

    public function roomtypes()
    {
        return $this->belongsTo(RoomTypes::class,'roomtype_id');
    }
}
