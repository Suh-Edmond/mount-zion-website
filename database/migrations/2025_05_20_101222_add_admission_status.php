<?php

use App\Constant\AdmissionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->enum('applicant_status', [AdmissionStatus::REJECTED, AdmissionStatus::ADMITTED, AdmissionStatus::UNDER_REVIEW])->default(AdmissionStatus::UNDER_REVIEW);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
