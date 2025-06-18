<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionYear extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'name',
        'year',
        'status',
        'start_date',
        'end_date',
        'program_id'
    ];

    public function admission()
    {
        return $this->hasMany(Admission::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
