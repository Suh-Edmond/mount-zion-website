<?php

namespace App\Models;

use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\isEmpty;

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

    public function getSpeakerSocialMediaHandle($handle){
        return explode("#", $handle);
    }

    public function getLinkedlnLink($social_media){
        $handles = $this->getSpeakerSocialMediaHandle($social_media);
        if(count($handles) < 1){
            return "";
        }

        return  $handles[0];
    }

    public function getFacebookLink($social_media){
        $handles = $this->getSpeakerSocialMediaHandle($social_media);
        if(count($handles) < 1){
            return "";
        }

        return  $handles[1];
    }

    public function getSkypeLink($social_media){
        $handles = $this->getSpeakerSocialMediaHandle($social_media);
        if(count($handles) < 1){
            return "";
        }

        return  $handles[2];
    }
}
