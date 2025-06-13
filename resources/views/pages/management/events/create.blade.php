@section('title', "New Event")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ $caption }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post"
                    action="{{ route('manage.events.store', ['school_slug' => '']) }}"
                    class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div class="grow my-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="flex gap-8">
                        <div class="grow my-4">
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                                :value="old('location')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                        </div>
                        <div class="grow my-4">
                            <x-input-label for="venue" :value="__('Venue')" />
                            <x-text-input id="venue" name="venue" type="text" class="mt-1 block w-full"
                                :value="old('venue')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('venue')" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-8">
                        <div class="grow my-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                :value="old('phone')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <div class="grow my-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                :value="old('email')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="grow mt-4">
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full"
                                :value="old('website')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('website')" />
                        </div>
                    </div>

                    <div class="flex gap-8">
                        <div class="grow my-4">
                            <x-input-label for="event_date" :value="__('Event Date')" />
                            <x-text-input id="event_date" name="event_date" type="date" class="mt-1 block w-full"
                                :value="old('event_date')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('event_date')" />
                        </div>
                        <div class="grow my-4">
                            <x-input-label for="event_time" :value="__('Event Time')" />
                            <x-text-input id="event_time" name="event_time" type="time" class="mt-1 block w-full"
                                :value="old('event_time')" step="1" required />
                            <x-input-error class="mt-2" :messages="$errors->get('event_time')" />
                        </div>
                    </div>

                    <div class="my-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea id="about" name="about" rows="4"
                            class=" about block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('about')}} </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('about')" />
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-auth-session-status :status="session('status')"
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)">
                            </x-auth-session-status>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script></script>