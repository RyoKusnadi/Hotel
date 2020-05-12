<?php

namespace App\Models;

use App\Models\Rooms;
use App\Models\HotelFacilities;
use Illuminate\Database\Eloquent\Model;

class ExtraServices extends Model
{
    protected $table = 'extraservices';
    protected $guarded = [];
    protected $fillable = ['room_id','facility_id','description'];

    public function rooms()
    {
        return $this->belongsTo(Rooms::class,'room_id');
    }
    public function hotelfacilities()
    {
        return $this->belongsTo(HotelFacilities::class,'facility_id');
    }
}
