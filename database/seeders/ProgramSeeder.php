<?php

namespace Database\Seeders;

use App\Constant\ProgramType;
use App\Models\Department;
use App\Models\Program;
use App\Models\School;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    private \Illuminate\Support\Collection $schools;

    public function __construct()
    {
        $this->schools = School::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 35; $i++) {
            Program::create([
                'name'    => $generator->sentence(3),
                'about'        => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                'image_path'   => '/images/dept_image.png',
                'duration'        => $generator->randomElement([1, 2, 3, 4]),
                'tag' => $generator->randomElement([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]),
                'school_id' => $generator->randomElement($this->schools)
            ]);
        }
    }
}
