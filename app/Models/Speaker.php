<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'name',
        'title',
        'picture',
        'event_id',
        'social_media_handles'  // string separated by #
    ];

    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
