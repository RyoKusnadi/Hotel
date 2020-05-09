<?php

namespace App\Models;

use App\Models\RoomPrices;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    protected $table = 'roomtypes';
    protected $guarded = [];
    protected $fillable = ['name','description'];

    public function roomprice()
    {
        return $this->hasMany(RoomPrices::class);
    }
}
