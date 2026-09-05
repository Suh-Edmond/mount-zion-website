<?php

namespace Database\Seeders;

use App\Constant\Gender;
use App\Constant\UserType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'   => "Peace Atem",
            'email'  => "peaceatem@gmail.com",
            'password' => Hash::make('admin'),
            'telephone' => "DE15172481539",
            'region'   => "North West",
            'address'  => "Germany",
            'dob'      => Carbon::now(),
            'pob'      => "Buea",
            'gender'   => Gender::FEMALE,
            'user_type' => UserType::STAFF
        ]);


    }
}
