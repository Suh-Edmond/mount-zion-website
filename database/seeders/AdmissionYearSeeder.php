<?php

namespace Database\Seeders;

use App\Models\AdmissionYear;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class AdmissionYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionYear::create([
            'name' => "Admission year 2025",
            'year' => '2025',
            'status' => true,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3)
        ]);
    }
}
