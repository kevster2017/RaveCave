<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateEvent extends Model
{
    use HasFactory;

    protected $table = 'rateevents'; // Explicitly specify the table name as laravel looking for a table called rate_events

    protected $fillable = [
        'stars',
        'comment',
    ];

    public function ratedBy()
    {
        return $this->belongsTo(User::class, 'ratings', 'event_id', 'user_id');
    }
}
