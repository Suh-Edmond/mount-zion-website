<div class="max-w-7xl mx-auto py-5 px-5">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Speakers') }}
                </h2>
            </header>

            <div>

                <a href="{{route('manage.events.speakers.create', ['slug' => $event->slug])}}">
                    <x-primary-button>{{ __('Add Speaker') }}</x-primary-button>
                </a>
                <a href="{{route('manage.events.speakers.list', ['slug' => $event->slug])}}">
                    <x-secondary-button>{{ __('View more') }}</x-secondary-button>
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach($event->speakers->take(3) as $key => $speaker)
                <div class="rounded overflow-hidden shadow-sm flex flex-col my-3">
                    <a href="{{route('manage.events.speakers.show', ['slug'=> $speaker->slug])}}"></a>
                    <div class="relative"><a href="{{route('manage.events.speakers.show', ['slug'=> $speaker->slug])}}">
                            <img class="w-25 rounded"
                                 src="{{asset($speaker->picture)}}"
                                 alt="Blog Image" height="50px">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-white-900 opacity-25">
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto text-center>
                        <a href="{{route('manage.events.speakers.show', ['slug'=> $speaker->slug])}}"
                           class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$speaker->name}}</a><br>
                        <a href="{{route('manage.events.speakers.show', ['slug'=> $speaker->slug])}}"
                           class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$speaker->title}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
