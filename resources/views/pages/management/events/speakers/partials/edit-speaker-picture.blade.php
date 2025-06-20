<x-modal name="edit-speaker-picture{{$speaker->id}}" :show="$errors->isNotEmpty()" focusable x-data="">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <h5 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{__('Edit Picture')}}
                </h5>
            </div>

            <form method="post"
                action="{{route('manage.documents.upload', ['slug' => $speaker->slug, 'type' => 'none', 'is_main' => false, 'file_type'=>'SPEAKER'])}}"
                class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="w-full">
                    <x-input-label for="image" :value="__('Upload Picture')" />
                    <input name="image" value="{{old('picture', $speaker->picture ?? '')}}" required
                        class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" accept="image/*">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG
                        (MAX. 1Mb).</p>
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>


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