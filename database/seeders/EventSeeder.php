<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 20; $i++){
            Event::create([
                'title'          => $faker->randomElement(['Edu Fest 2023: Igniting Minds Off on Transforming Lives', 'Fall 2023 Chamber Music Showcase 2']),
                'about'         => "Join us for the Future Minds Symposium, a thought-provoking educational event designed to inspire and empower individuals to navigate the challenges and opportunities of tomorrow's world. This symposium brings together leading experts, visionaries, and innovators from various fields to explore cutting-edge ideas and share insights on shaping the future.",
                'location'       => 'Pinecrest Golf Club,123 Fairway Lane, Anytown, USA',
                'venue'         => 'Starry Haven Events Center',
                'phone'         => '(+1) 0 221 457 441',
                'email'         => 'mountzion.edu.com',
                'website'       => 'www.mountzion.com',
                'event_time'          => $faker->time(),
                'event_date'        => $faker->date()
            ]);
        }
    }
}
