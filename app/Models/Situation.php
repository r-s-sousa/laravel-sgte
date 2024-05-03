<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    use HasFactory;

    protected $fillable = [
        'military_id',
        'description',
        'start_date',
        'days',
        'end_date'
    ];
}
