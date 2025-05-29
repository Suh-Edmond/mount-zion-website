<x-modal name="edit-school" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="edit-school">
    <form method="post" action="{{ route('manage.academic.edit', ['slug' => $school->slug]) }}" class="p-6" >
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update School') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Provide Information below to update school information.") }}
        </p>


        <div class="my-4">
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $school->name)" required autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="my-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                          :value="old('email', $school->email)" required autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('email')"/>
        </div>

        <div class="my-4">
            <x-input-label for="telephone" :value="__('Telephone')"/>
            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full"
                          :value="old('telephone', $school->telephone)" required autocomplete="telephone"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('telephone')"/>
        </div>

        <div class="my-4">
            <x-input-label for="address" :value="__('Address')"/>
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                          :value="old('address', $school->address)" required autocomplete="address"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('address')"/>
        </div>

        <div class="my-4">
            <x-input-label for="region" :value="__('Region')"/>
            <x-text-input id="region" name="region" type="text" class="mt-1 block w-full"
                          :value="old('region', $school->region)" required autocomplete="region"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('region')"/>
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
