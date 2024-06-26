<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function followedBy()
    {
        return $this->belongsToMany(User::class, 'follows');
    }
}
