<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventSection;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSectionSeeder extends Seeder
{
    private $events;

    public function __construct()
    {
        $this->events = Event::all()->pluck('id');
    }
    /**
     * Run the database seeds.
     */
    public function run(Generator $generator): void
    {
        for ($i = 0; $i < 50; $i++){
            EventSection::create([
                'event_id'  => $generator->randomElement($this->events),
                'title'     => $generator->randomElement([
                    "Interactive Workshops",
                    "INetworking Opportunities",
                    "Networking Opportunities",
                    "Registration"
                ]),
                'body'      => $generator->randomElement([
                    "Connect with like-minded individuals, professionals, and mentors. Build a network that will support your personal and professional growth, fostering collaboration and idea exchange.",
                    "Hear from renowned thought leaders who will delve into topics such as artificial intelligence, sustainability, and the future of work. Gain valuable perspectives to help you thrive.",
                    "Hear from renowned thought leaders who will delve into topics such as artificial intelligence, sustainability, and the future of work. Gain valuable perspectives.",
                    "Secure your spot today and be part of the Future Minds Symposium. Early bird registration is now open at www.Unipix Don't miss this opportunity to gain valuable insights."
                ])
            ]);
        }
    }
}
