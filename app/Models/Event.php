<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    use GenerateUUID;

    protected $fillable = [
        'about',
        'title',
        'location',
        'venue',
        'phone',
        'email',
        'website',
        'event_time',
        'event_date'
    ];

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }

    public function eventSections()
    {
        return $this->hasMany(EventSection::class);
    }

    public function eventGallery()
    {
        return $this->hasMany(EventGallery::class);
    }


    //TODO: ENSURE THE IS A MAIN SPEAKER
    public function getFirstSpeaker($speakers)
    {
        return count($speakers) > 1 ? $speakers[0]->name : '';
    }

    public function getMainImage($event)
    {
        $mainImage = $event->eventGallery()->where('is_main', true)->first();
         
        return $mainImage->file_path ?? "";
    }
}
