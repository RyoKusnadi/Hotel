<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    protected $guarded = [];
    // protected $fillable = ['roomNo','roomtype_id','floor','beds','status','roomPicture','maxCapacity','remark'];
    protected $fillable = ['roomtype_id'];

    public function roomtypes()
    {
        return $this->belongsTo(RoomTypes::class,'roomtype_id');
    }
}