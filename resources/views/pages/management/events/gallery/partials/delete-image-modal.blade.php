<x-modal name="remove_image{{$value->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="">
    <div class="p-5">
        <form method="post"
            action="{{ route('manage.events.gallery.delete', ['slug' => $value->slug, 'event_slug' => $value->event->slug]) }}">
            @csrf
            @method('delete')

            <h4 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this Image?') }}
            </h4>

            <div class="m-2">
                <img class="w-25 rounded" src="{{asset($value->file_path)}}" alt="Blog Image" height="20px">
            </div>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Image') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>