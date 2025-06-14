<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionDocument extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'admission_id',
        'file_path',
        'category'
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function splitDocumentName($doc) 
    {
        $explode = explode("/", $doc);
        $eles = count($explode);

        return $explode[$eles - 1];
    }
}
