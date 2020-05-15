<?php

namespace App\Models;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    protected $table = 'roomtypes';
    protected $guarded = [];
    protected $fillable = ['name','price','description'];

    public function room()
    {
        return $this->hasMany(Rooms::class);
    }
}
