<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods'; // Explicitly specify the table name as laravel looking for a table called food

    protected $fillable = [
        'businessName',
        'image',
        'town',
        'type',
        'description',
        'webLink',

    ];

    // Define relationship with User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
