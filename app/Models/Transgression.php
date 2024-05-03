<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transgression extends Model
{
    use HasFactory;

    protected $fillable = [
        'actuator_id', 'acted_id', 'description', 'date'
    ];
}
