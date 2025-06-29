<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = ['venue_id', 'sport_id', 'name', 'images', 'rules', 'active'];

    protected $casts = [
        'images' => 'array',
        'active' => 'boolean',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
