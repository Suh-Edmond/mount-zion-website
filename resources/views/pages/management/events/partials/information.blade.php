<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Event Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update event information.") }}
        </p>
    </header>


    <form method="post" action="{{ route('manage.events.update', ['slug' => $event->slug]) }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $event->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $event->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Telephone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $event->phone)" required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $event->location)" required autocomplete="location" />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <div>
            <x-input-label for="venue" :value="__('Venue')" />
            <x-text-input id="venue" name="venue" type="text" class="mt-1 block w-full" :value="old('venue', $event->venue)" required autocomplete="venue" />
            <x-input-error class="mt-2" :messages="$errors->get('venue')" />
        </div>

        <div>
            <x-input-label for="event_date" :value="__('Date')" />
            <x-text-input id="event_date" name="event_date" type="date" class="mt-1 block w-full" :value="old('event_date', $event->event_date)" required autocomplete="event_date" />
            <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
        </div>

        <div>
            <x-input-label for="time" :value="__('Time')" />
            <x-text-input id="event_time" name="event_time" type="time" class="mt-1 block w-full" :value="old('event_time', $event->event_time)" required autocomplete="event_time" />
            <x-input-error class="mt-2" :messages="$errors->get('time')" />
        </div>

        <div>
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', $event->website)" required autocomplete="website" />
            <x-input-error class="mt-2" :messages="$errors->get('website')" />
        </div>

        <div class="my-4">
            <x-input-label for="about" :value="__('About')"/>
            <textarea id="about" name="about" rows="4"
                      class=" about block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('about', $event->about)}} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-auth-session-status :status="session('status')"
                                   x-data="{ show: true }"
                                   x-show="show"
                                   x-transition
                                   x-init="setTimeout(() => show = false, 2000)">
            </x-auth-session-status>
        </div>
    </form>
</section>
