{{-- MODAL FOR EDIT EVENT SECTION --}}


<x-modal name="edit_event_section{{$section->id}}" :show="$errors->slotCreation->isNotEmpty()" focusable
    x-data="edit-event-section">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $event->title }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Provide Information to add event section.") }}
                </p>
            </div>

            <form method="post" action="{{ route('manage.events.create', ['slug' => $event->slug]) }}"
                class="mt-6 space-y-6">
                @csrf

                <div class="grow my-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        value="{{old('title',$section->title ?? '')}}" required autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <x-input-label for="body" value="Body" />
                <textarea id="body" name="body" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('body', $section->body ?? '')}}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('body')" />


                <div class="mt-6 flex justify-end space-x-3">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-modal>