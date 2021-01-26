<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable =[
        
        'booking_id',
        'firstname',
        'lastname'
    ];


    public function bookings()
    {
        return $this->belongsTo(Booking::class);
    }
}


