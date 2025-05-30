<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\School;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        School::create([
            'name'   => "Mount Zion Institute Bamenda",
            'image_path' => 'assets/images/campus/gallery/buea_campus.png',
            'email' => "dratempaul2015@gmail.com",
            'telephone' => "(+237)677770177 / (+237)696953664",
            'address' => "Vicky Street (Near Guarantee Express) Bamenda, Cameroon",
            'region' => 'Northwest'
        ]);


        School::create([
            'name'   => "Mount Zion Institute Buea",
            'image_path' => 'assets/images/campus/gallery/bamenda_campus.png',
            'email' => 'dratempaul2015@gmail.com',
            'telephone' => "(+2370677770177 / (+237)696953664",
            'address' => "Street One, Great Soppo Buea - Cameroon",
            'region' => 'Southwest'
        ]);
    }
}
