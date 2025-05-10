<?php

namespace Database\Seeders;

use App\Models\AdmissionYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionYear::create([
            'name' => "Admission year 2025",
            'year' => '2025'
        ]);
    }
}
