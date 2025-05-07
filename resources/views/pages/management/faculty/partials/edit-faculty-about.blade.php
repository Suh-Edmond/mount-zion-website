<x-modal name="edit-faculty-about" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="edit-faculty">
    <form method="post" action="{{ route('manage.academic.edit', ['slug' => $faculty->slug]) }}" class="p-6" >
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Faculty') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Provide Information below to update faculty about.") }}
        </p>


        <div class="my-4 hidden">
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $faculty->name)" required autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="my-4 hidden">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                          :value="old('email', $faculty->email)" required autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('email')"/>
        </div>

        <div class="my-4 hidden">
            <x-input-label for="telephone" :value="__('Telephone')"/>
            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full"
                          :value="old('telephone', $faculty->telephone)" required autocomplete="telephone"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('telephone')"/>
        </div>

        <div class="mt-4">
            <x-input-label for="about" :value="__('About')" />
            <textarea id="about" name="about" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('about', $faculty->about)}}</textarea>

            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
