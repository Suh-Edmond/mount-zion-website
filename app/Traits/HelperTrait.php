<?php

namespace App\Traits;

use App\Constant\AdmissionStatus;
use App\Constant\Gender;
use Carbon\Carbon;

trait HelperTrait
{
    public function getRegions(){
        return [
        "Adamawa - Ngaoundere" ,
        "Centre - Yaoundé" ,
        "East - Bertoua" ,
        "Far North - Maroua",
        "Littoral - Douala",
        "North - Garoua",
        "North West - Bamenda",
        "West - Bafoussam",
        "Southwest - Buea",
        'South - Ebolowa'
        ];
    }

    public function getGenders(){
        return [Gender::MALE, Gender::FEMALE];
    }

    public function getApplicationStatus() {
        return [AdmissionStatus::ADMITTED, AdmissionStatus::REJECTED];
    }

    public function checkIfApplicationDeadlineHadExpire($end_date){
        return Carbon::now()->isAfter($end_date);
    }
}
