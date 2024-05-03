<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Military extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'birth_date',
        'position_id',
        'section_id',
        'war_number',
        'war_name',
        'name',
        'mother_name',
        'father_name',
        'military_identity',
        'cpf',
        'function',
        'phone_number',
        'manager_number',
        'religion',
        'marital_status',
        'image_path',
        'blood_type',
        'consumes_alcohol',
        'smokes_cigarette'
    ];
}
