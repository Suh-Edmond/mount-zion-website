<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Speaker;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    private $events;

    public function __construct()
    {
        $this->events = Event::all()->pluck('id');
    }

    /**
     * Run the database seeds.
     * Rick Zonson
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 30; $i++){
            Speaker::create([
                'name'    =>  $generator->randomElement(['Rick Zonson', 'Thomas Fred', 'Albert Mack', 'Micheal Alfred']),
                'title'    => $generator->randomElement(['Assistant Lecturer', 'Lecturer', 'Professor', 'Vice Chancellor']),
                'picture'  => $generator->randomElement(['assets/images/speaker/02.jpg', 'assets/images/speaker/01.jpg', 'assets/images/speaker/03.jpg']),
                'event_id' => $generator->randomElement($this->events),
                'social_media_handles' => "facbook_url#skype_url#linkedin_url"
            ]);
        }
    }
}
