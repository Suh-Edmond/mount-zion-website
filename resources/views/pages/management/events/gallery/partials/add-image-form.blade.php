<x-modal name="add_image_modal" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <h5 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{__('Add Image')}}
                </h5>
            </div>

            <form method="post" action="{{ route('{{ route('manage.documents.upload', ['slug' => $value->slug, 'type' => 'none']') }}"
                class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="w-full">
                    <x-input-label for="picture" :value="__('Upload Picture')" />
                    <input name="picture" value="{{old('picture', $speaker->picture ?? '')}}" required
                        class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG
                        (MAX. 1Mb).</p>
                    <x-input-error class="mt-2" :messages="$errors->get('picture')" />
                </div>

                @if(!$hasMainImage)
                <div class="my-4 flex space-x-2">
                    <x-input-label for="is_main" :value="__('Main Picture: ')" required />
                    <input id="is_main" name="is_main" type="checkbox" class="mt-1" :value="old('is_main')" required
                        autocomplete="is_main" />
                </div>
                <small class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">You can only have a
                    single main picture per event</small>
                @endif
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