<?php

namespace Database\Seeders;

use App\Constant\DocumentCategory;
use App\Constant\ProgramType;
use App\Models\Admission;
use App\Models\AdmissionDocument;
use App\Models\Program;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AdmissionDocumentSeeder extends Seeder
{
    private $admissions;

    public function __construct()
    {
        $this->admissions = Admission::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 25; $i++) {
            AdmissionDocument::create([
                'admission_id'    => $generator->randomElement($this->admissions),
                'file_path'   => '/images/dept_image.png',
                'category' => $generator->randomElement([DocumentCategory::ID_CARD, DocumentCategory::HND_CERT, DocumentCategory::GCE_CERT, DocumentCategory::DEGREE_CERT, DocumentCategory::PASSPORT]),
            ]);
        }
    }
}
