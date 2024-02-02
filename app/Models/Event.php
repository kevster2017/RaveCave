<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'time',
        'dj',
        'video',
        'description',
        'price',
        'image'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
