<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';
    protected $guarded = [];
    protected $fillable = ['bookno','room_id','userid','roomtype_id','status','check_in','check_out','total','discount_id','final_price'];

    public function rooms()
    {
        return $this->belongsTo(Rooms::class,'room_id');
    }
    public function roomtypes()
    {
        return $this->belongsTo(RoomTypes::class,'roomtype_id');
    }
    public function roomdiscounts()
    {
        return $this->belongsTo(RoomDiscounts::class,'discount_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'userid');
    }
}
