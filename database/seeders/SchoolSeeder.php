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
            'name'   => "Mount Zion Institute Buea",
            'image_path' => '/images/dept_image.png',
            'email' => $generator->email,
            'telephone' => $generator->phoneNumber,
            'address' => $generator->address,
            'region' => 'SOUTHWEST'
        ]);


        School::create([
            'name'   => "Mount Zion Institute Bamenda",
            'image_path' => '/images/dept_image.png',
            'email' => $generator->email,
            'telephone' => $generator->phoneNumber,
            'address' => $generator->address,
            'region' => 'NORTHWEST'
        ]);
    }
}
