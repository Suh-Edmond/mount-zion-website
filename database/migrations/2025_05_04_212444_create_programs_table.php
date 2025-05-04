<?php

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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('about');
            $table->string('image_path');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->enum('program_type', [\App\Constant\ProgramType::UNDERGRADUATE, \App\Constant\ProgramType::POSTGRADUATE, \App\Constant\ProgramType::MBA]);
            $table->foreignId('department_id')->constrained();
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
