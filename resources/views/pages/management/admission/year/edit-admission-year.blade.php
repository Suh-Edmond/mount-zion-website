<x-modal name="edit-admission-year{{$value->id}}" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="">
    <div class="p-6">
        <form method="post" action="{{ route('manage.admission.years.edit', ['slug' => $value->slug]) }}" >
            @csrf
            @method('PUT')
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Edit Admission Year') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Provide Information below to edit an admission year.") }}
            </p>


            <div class="my-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                              value="{{$value->name}}" required autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="my-4">
                <x-input-label for="year" :value="__('Year')"/>
                <input type="number" id="year" value="{{$value->year}}" required name="year" min="2020" max="2050" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                <x-input-error class="mt-2" :messages="$errors->slotCreation->get('year')"/>
            </div>

            <div class="my-4">
                <x-input-label for="year" :value="__('Start Date')"/>
                <input type="date" id="start_date" value="{{$value->start_date}}" required name="start_date" min="2020" max="2050" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                <x-input-error class="mt-2" :messages="$errors->slotCreation->get('start_date')"/>
            </div>

            <div class="my-4">
                <x-input-label for="end_date" :value="__('End Date')"/>
                <input type="date" id="end_date" value="{{$value->end_date}}" required name="end_date" min="2020" max="2050" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                <x-input-error class="mt-2" :messages="$errors->slotCreation->get('end_date')"/>
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
    </div>
</x-modal>
