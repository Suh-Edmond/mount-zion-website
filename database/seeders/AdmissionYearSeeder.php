<?php

namespace Database\Seeders;

use App\Models\AdmissionYear;
use App\Models\Program;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class AdmissionYearSeeder extends Seeder
{

    private $programs;
    public function __construct()
    {
        $this->programs = Program::all()->pluck('id');
    }
    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        AdmissionYear::create([
            'name' => "Admission year 2026",
            'year' => '2026',
            'status' => true,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3),
            'program_id'   => $generator->randomElement($this->programs),
        ]);
    }
}
