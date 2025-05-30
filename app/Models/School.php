<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'name',
        'email',
        'image_path',
        'telephone',
        'address',
        'region'
    ];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function stripDescriptionTags($desc)
    {
        return strip_tags($desc);
    }


}
