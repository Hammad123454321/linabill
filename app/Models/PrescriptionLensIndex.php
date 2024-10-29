<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionLensIndex extends Model
{
    use HasFactory;

    protected $table = 'prescription_lens_indexes';

    protected $fillable = [
        'prescription_lens_id',
        'name',
        'description',
        'price',
        'is_recommended',
        'user_id',
        'status',
        'image',
    ];

    // Define relationships as necessary
    public function lens()
    {
        return $this->belongsTo(PrescriptionLense::class, 'prescription_lens_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'prescription_lens_index_color');
    }
}
