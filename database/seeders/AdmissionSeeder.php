<?php /** @noinspection ALL */

namespace Database\Seeders;

use App\Constant\AdmissionSession;
use App\Constant\AdmissionStatus;
use App\Constant\ProgramType;
use App\Models\Admission;
use App\Models\AdmissionYear;
use App\Models\Program;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AdmissionSeeder extends Seeder
{
    private $users;
    private $programs;
    private $admissionYears;

    public function __construct()
    {
        $this->programs = Program::all()->pluck('id');
        $this->users = User::all()->pluck('id');
        $this->admissionYears = AdmissionYear::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 5; $i++) {
            Admission::create([
                'user_id'    => $generator->randomElement($this->users),
                'program_id'   => $generator->randomElement($this->programs),
                'admission_year_id'        => $generator->randomElement($this->admissionYears),
                'applicant_status'         => $generator->randomElement([AdmissionStatus::ADMITTED, AdmissionStatus::REJECTED])
            ]);
        }
    }
}
