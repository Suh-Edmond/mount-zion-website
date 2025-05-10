<?php

namespace Database\Seeders;

use App\Models\AdmissionYear;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(SchoolSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(AdmissionYearSeeder::class);
        $this->call(UserSeed::class);
        $this->call(AdmissionSeeder::class);
        $this->call(AdmissionDocumentSeeder::class);
    }
}
