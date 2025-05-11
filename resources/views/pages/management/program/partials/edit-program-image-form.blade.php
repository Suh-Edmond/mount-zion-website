<x-modal name="edit-program-image" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="edit-program-image">
    <div class="w-full">
        <form method="post" action="{{ route('manage.academics.programs.edit-upload-image', ['slug' => $program->slug ?? ""]) }}" class="mt-6 space-y-6 w-full"  enctype="multipart/form-data">
            @csrf

            <div class="w-full">
                <x-input-label for="image_path" :value="__('Program Image')" />
                <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" :value="old('image_path', $program->image_path ?? '')" required    />
                <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'program image updated successfully')
                    <x-auth-session-status :status="session('status')"  x-data="{ show: true }"
                                           x-show="show"
                                           x-transition
                                           x-init="setTimeout(() => show = false, 3000)">

                    </x-auth-session-status>
                @endif
            </div>
        </form>
    </div>
</x-modal>
