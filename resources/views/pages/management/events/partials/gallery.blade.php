<div class="max-w-7xl mx-auto py-5 px-5">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Gallery') }}
                </h2>
            </header>

            <div>

                <a href="{{route('manage.events.speakers.create', ['slug' => $event->slug])}}">
                    <x-primary-button>{{ __('Add Image') }}</x-primary-button>
                </a>
                <a href="{{route('manage.events.speakers.list', ['slug' => $event->slug])}}">
                    <x-secondary-button>{{ __('View more') }}</x-secondary-button>
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach($event->eventGallery->take(3) as $key => $image)
                <div class="rounded overflow-hidden shadow-lg flex flex-col my-3">
                    <a href="{{route('manage.events.speakers.show', ['slug'=> $image->slug])}}"></a>
                    <div class="relative"><a href="{{route('manage.events.speakers.show', ['slug'=> $image->slug])}}">
                            <img class="w-full rounded"
                                 src="{{asset('/images/dept_image.png')}}"
                                 alt="Blog Image" height="50px">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
