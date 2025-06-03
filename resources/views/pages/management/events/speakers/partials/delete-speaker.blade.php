<x-modal name="remove-speaker{{$speaker->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="">
    <div class="p-5">
        <form method="post"
            action="{{ route('manage.events.speakers.delete', ['slug' => $speaker->slug, 'event_slug' => $speaker->event->slug]) }}">
            @csrf
            @method('delete')

            <h4 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this Speaker?') }}
            </h4>
            <h4 class="text-lg font-medium text-gray-900 my-2">
                Name : {{ $speaker->name }}
            </h4>
            <h4 class="text-lg font-medium text-gray-900 my-2">
                Title : {{ $speaker->title }}
            </h4>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Speaker') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>