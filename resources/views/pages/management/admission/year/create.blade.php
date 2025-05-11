<x-modal name="create-admission-year" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="">
    <form method="post" action="{{ route('manage.admission.years.create', ['slug' => '']) }}" class="p-6" >
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create Admission Year') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Provide Information below to add an admission year.") }}
        </p>


        <div class="my-4">
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name')" required autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="my-4">
            <x-input-label for="year" :value="__('Year')"/>
            <input type="number" id="year" value="{{old('year')}}" required name="year" min="2020" max="2050" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('year')"/>
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
