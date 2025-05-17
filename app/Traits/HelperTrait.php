<?php

namespace App\Traits;

use App\Constant\Gender;

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
}
