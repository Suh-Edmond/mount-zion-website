<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'name',
        'about',
        'image_path',
        'tag',
        'duration',
        'school_id'
    ];


    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function stripDescriptionTags($desc)
    {
        return strip_tags($desc);
    }
}
