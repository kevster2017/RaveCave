<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DJ extends Model
{
    use HasFactory;

    protected $table = 'djs'; // Explicitly specify the table nameas laravel looking for a table called d_j_s

    protected $fillable = [
        'djname',
        'image',
        'town',
        'country',
        'genre',
        'description',
        'social',
        'date',

    ];

    // Define relationship with User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
