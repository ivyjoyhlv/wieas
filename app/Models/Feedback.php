<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks'; // Explicitly set the table name
    protected $fillable = [
        'name',
        'feedback',
        'rating',
        'image',
    ];
}
