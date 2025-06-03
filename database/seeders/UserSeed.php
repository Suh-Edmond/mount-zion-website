<?php

namespace Database\Seeders;

use App\Constant\Gender;
use App\Constant\UserType;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 4; $i++) {
            User::create([
                'name'   => $generator->name,
                'email'  => $generator->email,
                'password' => Hash::make('password'),
                'telephone' => $generator->phoneNumber,
                'region'   => $generator->randomElement(['Northwest', 'Southwest']),
                'address'  => $generator->address,
                'dob'      => Carbon::now(),
                'pob'      => $generator->address,
                'gender'   => $generator->randomElement([Gender::MALE, Gender::FEMALE]),
                'user_type' => $generator->randomElement([UserType::APPLICANT, UserType::STAFF])
            ]);
        }

        User::create([
            'name'   => "testuser",
            'email'  => "testuser@gmail.com",
            'password' => Hash::make('testuser'),
            'telephone' => $generator->phoneNumber,
            'region'   => $generator->randomElement(['Northwest', 'Southwest']),
            'address'  => $generator->address,
            'dob'      => Carbon::now(),
            'pob'      => $generator->address,
            'gender'   => Gender::MALE,
            'user_type' => UserType::STAFF
        ]);
    }
}
