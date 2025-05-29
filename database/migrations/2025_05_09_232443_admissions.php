<?php

use App\Constant\AdmissionSession;
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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admission_year_id')->constrained();
            $table->foreignId('program_id')->constrained();
            $table->string('slug')->unique();
            $table->enum('admission_session', [AdmissionSession::APRIL, AdmissionSession::JUNE, AdmissionSession::JANUARY, AdmissionSession::SEPTEMBER]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
