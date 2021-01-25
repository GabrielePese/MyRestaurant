<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable =[
        
        'firstname',
        'lastname'
    ];


    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }
}


