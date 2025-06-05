<x-modal name="edit-speaker{{$speaker->id}}" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $speaker->event->title }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Provide Information to add event speaker.") }}
                </p>
            </div>

            <form method="post" action="{{ route('manage.events.speakers.store', ['slug' => $speaker->event->slug]) }}"
                class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="grow my-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{$speaker->name}}"
                        required autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="grow my-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        value="{{$speaker->title}}" required autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div class="grow my-4">
                    <x-input-label for="linkedln" :value="__('Linkedln Link')" />
                    <x-text-input id="linkedln" name="linkedln" type="text" class="mt-1 block w-full"
                        value="{{$speaker->getLinkedlnLink($speaker->social_media_handles)}}" required
                        autocomplete="linkedln" />
                </div>

                <div class="grow my-4">
                    <x-input-label for="skype" :value="__('Skype ID')" />
                    <x-text-input id="skype" name="skype" type="text" class="mt-1 block w-full"
                        value="{{$speaker->getFacebookLink($speaker->social_media_handles)}}" required
                        autocomplete="skype" />
                </div>

                <div class="grow my-4">
                    <x-input-label for="facebook" :value="__('Facebook Link')" />
                    <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full"
                        value="{{$speaker->getSkypeLink($speaker->social_media_handles)}}" required
                        autocomplete="facebook" />
                </div>


                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                        x-transition x-init="setTimeout(() => show = false, 2000)">
                    </x-auth-session-status>
                </div>
            </form>
        </div>
    </div>
</x-modal>