@section('title', "Academics-Create")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.academics')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Event Management') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="{{route('manage.events.show', ['slug' => $event->slug])}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ $event->title }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="{{route('manage.events.speakers.list', ['slug' => $event->slug])}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Speakers') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="#">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Add Event Speaker') }}
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $event->title }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Provide Information to add event speaker.") }}
                    </p>
                </div>

                <form method="post" action="{{ route('manage.events.speakers.store', ['slug' => $event->slug]) }}"
                    class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div class="grow my-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                            required autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grow my-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title')" required autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="grow my-4">
                        <x-input-label for="linkedln" :value="__('Linkedln Link')" />
                        <x-text-input id="linkedln" name="linkedln" type="text" class="mt-1 block w-full"
                            :value="old('linkedln')" required autocomplete="linkedln" />
                    </div>

                    <div class="grow my-4">
                        <x-input-label for="skype" :value="__('Skype ID')" />
                        <x-text-input id="skype" name="skype" type="text" class="mt-1 block w-full"
                            :value="old('skype')" required autocomplete="skype" />
                    </div>

                    <div class="grow my-4">
                        <x-input-label for="facebook" :value="__('Facebook Link')" />
                        <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full"
                            :value="old('facebook')" required autocomplete="facebook" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="picture" :value="__('Upload Picture')" />
                        <input name="picture" value="{{old('picture', $speaker->picture ?? '')}}" required
                            class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG
                            (MAX. 1Mb).</p>
                        <x-input-error class="mt-2" :messages="$errors->get('picture')" />
                    </div>


                    <div class="flex flex-row justify-between">
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                                x-transition x-init="setTimeout(() => show = false, 2000)">
                            </x-auth-session-status>
                        </div>

                        <a href="{{route('manage.events.speakers.list', ['slug' => $event->slug])}}">
                            <x-secondary-button>{{ __('Back') }}</x-secondary-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script></script>