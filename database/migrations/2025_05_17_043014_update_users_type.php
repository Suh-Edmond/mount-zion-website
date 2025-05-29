<?php

use App\Constant\Gender;
use App\Constant\UserType;
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
        Schema::table('users', function (Blueprint  $table){
            $table->date('dob')->nullable();
            $table->string('pob')->nullable();
            $table->enum('gender', [Gender::FEMALE, Gender::MALE])->nullable();
            $table->enum('user_type', [UserType::APPLICANT, UserType::STAFF])->default(UserType::APPLICANT);
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
