<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $fillable =[
        'slots'
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}



