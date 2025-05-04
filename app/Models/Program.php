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
        'email',
        'telephone',
        'program_type',
        'department_id'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
