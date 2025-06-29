<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'logo', 'email', 'phone', 'province', 'canton', 'district', 'address', 'latitude', 'longitude', 'waze_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courts()
    {
        return $this->hasMany(Court::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
