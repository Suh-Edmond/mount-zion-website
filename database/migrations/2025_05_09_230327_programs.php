<?php

use App\Constant\ProgramType;
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
            $table->integer('duration'); //in years
            $table->enum('tag', [ProgramType::SPECIAL_CARE, ProgramType::BACHELOR, ProgramType::HND]);
            $table->string('slug')->unique();
            $table->string('image_path')->nullable();
            $table->foreignId('school_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
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
