<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'name',
        'about',
        'image_path',
        'email',
        'telephone'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function stripDescriptionTags($desc)
    {
        return strip_tags($desc);
    }
}
