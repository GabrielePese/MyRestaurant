<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =[
        'desk_id',
        'date'
    ];


    public function desk()
    {
        return $this->belongsTo(Desk::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
