<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['name', 'slug', 'icon'];

    public function courts()
    {
        return $this->hasMany(Court::class);
    }
}
