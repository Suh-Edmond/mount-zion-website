<x-modal name="delete_section{{$section->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="post"
                action="{{ route('manage.events.section.delete', ['slug' => $section->slug, 'event_slug' => $section->event->slug]) }}"
                class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to Delete this Event Section?') }}
                </h2>


                <p class="mt-1 text-md font-medium text-gray-600">
                    Title: {{ $section->title }}
                </p>



                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </div>
</x-modal>