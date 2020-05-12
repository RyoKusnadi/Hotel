<?php

namespace App\Models;

use App\Models\ExtraServices;
use Illuminate\Database\Eloquent\Model;

class HotelFacilities extends Model
{
    protected $table = 'hotelfacilities';
    protected $guarded = [];
    protected $fillable = ['name','price','description'];

    public function extraservices()
    {
        return $this->hasMany(ExtraServices::class);
    }
}
