<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionFieldRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'field',
        'eye',
        'min_value',
        'max_value',
        'step_value',
        'default_value',
        'is_prism',
        'pd_type',
    ];
}
