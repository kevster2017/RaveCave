<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages'; // Explicitly specify the table name as laravel looking for a table called message

    protected $fillable = [
        'message',

    ];

    // Define relationship with User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Event Model
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
