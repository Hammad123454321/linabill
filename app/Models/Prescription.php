<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'meta',
        'parent_id',
        'user_id',
        'status',
        'type',
    ];

    // Getter for the 'meta' attribute
    public function getMetaAttribute($value)
    {
        return json_decode($value, true); // Decodes the JSON string to an associative array
    }

    // Optional: If you want to save the meta as JSON when updating
    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = json_encode($value); // Encodes the array back to JSON when saving
    }


    public function parent()
    {
        return $this->belongsTo(Prescription::class, 'parent_id');
    }

    public function child_prescriptions()
    {
        return $this->hasMany(Prescription::class, 'parent_id'); // Adjust 'parent_id' as per your database schema
    }


    // Relationship to get ranges where field is 'OD' or 'OS'
    public function eye_ranges(): HasMany
    {
        return $this->hasMany(PrescriptionFieldRange::class)
            ->whereIn('eye', ['OD', 'OS'])->whereIn('field', ['sph', 'cyl', 'axis', 'add']);
    }

    // Relationship to get ranges where field is 'OD' or 'OS'
    public function prescription_field_ranges(): HasMany
    {
        return $this->hasMany(PrescriptionFieldRange::class);
    }

    // Relationship to get ranges where field is 'pd'
    public function pd_ranges(): HasMany
    {
        return $this->hasMany(PrescriptionFieldRange::class)
            ->where('field', 'pd');
    }

    // Relationship to get ranges where field is 'magnification'
    public function magnification_ranges(): HasMany
    {
        return $this->hasMany(PrescriptionFieldRange::class)
            ->where('field', 'magnification');
    }

    public function lenses()
    {
        return $this->hasMany(PrescriptionLense::class);
    }
}
