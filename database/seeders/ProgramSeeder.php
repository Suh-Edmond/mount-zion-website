<?php

namespace Database\Seeders;

use App\Constant\ProgramType;
use App\Models\Department;
use App\Models\Program;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    private \Illuminate\Support\Collection $departments;

    public function __construct()
    {
        $this->departments = Department::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 80; $i++) {
            Program::create([
                'name'    => $generator->sentence(3),
                'about'        => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                'image_path'   => '/images/dept_image.png',
                'email'        => $generator->email,
                'telephone'    => $generator->phoneNumber,
                'program_type' => $generator->randomElement([ProgramType::UNDERGRADUATE, ProgramType::POSTGRADUATE, ProgramType::MBA]),
                'department_id' => $generator->randomElement($this->departments)
            ]);
        }
    }
}
