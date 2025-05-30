<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admission extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'user_id',
        'admission_year_id',
        'program_id',
        'applicant_status'
    ];


    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function admissionYear()
    {
        return $this->belongsTo(AdmissionYear::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admissionDocuments()
    {
        return $this->hasMany(AdmissionDocument::class);
    }

    public function trimApplicantStatus($status)
    {
        return str_replace('_', ' ', $status);
    }
}
