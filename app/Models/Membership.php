<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['venue_id', 'type', 'price', 'start_date', 'end_date', 'status'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
