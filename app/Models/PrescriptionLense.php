<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionLense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'meta',
        'parent_id',
        'is_self_lens_index',
        'price',
        'status',
        'image',
    ];

    // Getter for the 'meta' attribute
    public function getMetaAttribute($value)
    {
        return json_decode($value, true); // Decodes the JSON string to an associative array
    }

    public function parent()
    {
        return $this->belongsTo(PrescriptionLense::class, 'parent_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'prescription_lense_colors');
    }

    public function lens_indexes()
    {
        return $this->hasMany(PrescriptionLensIndex::class, 'prescription_lens_id');
    }

    public function child_lenses()
{
    return $this->hasMany(PrescriptionLense::class, 'parent_id');
}
}
