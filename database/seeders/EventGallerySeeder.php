<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventGallery;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventGallerySeeder extends Seeder
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
        for ($i = 0; $i < 20; $i++){
            $event_id = $generator->randomElement($this->events);
            $event = Event::findOrFail($event_id);
            $main_image = $event->eventGallery()->where('is_main', true)->first();
            if(!isset($main_image)){
                EventGallery::create([
                    'event_id'  => $event_id,
                    'file_path' => "assets/images/blog/04.jpg",
                    'is_main'   => true
                ]);
            }else{
                EventGallery::create([
                    'event_id'  => $event_id,
                    'file_path' => "assets/images/blog/04.jpg",
                    'is_main'   => false
                ]);
            }

        }
    }
}
