<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function dj()
    {
        return $this->belongsTo(Dj::class, 'dj_id');
    }
}
