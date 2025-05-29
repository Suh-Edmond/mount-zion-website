<x-modal name="edit-program" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="edit-program">
    <form method="post" action="{{ route('manage.academics.programs.edit', ['slug' => $program->slug]) }}" class="p-6" >
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Program') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Provide Information below to update program.") }}
        </p>


        <div class="my-4">
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $program->name)" required autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="my-4">
            <x-input-label for="duration" :value="__('Duration')"/>
            <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full"
                          :value="old('duration', $program->duration)" required autocomplete="duration"/>
            <x-input-error class="mt-2" :messages="$errors->slotCreation->get('duration')"/>
        </div>

        <div class="my-4">
            <x-input-label for="tag" :value="__('Program Type')"/>
            <select id="tag" name="tag"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select program type</option>
                @foreach($tags as $key => $tag)
                    <option value="{{$tag}}" {{ $program->tag === $tag ? 'selected' : '' }}>{{$tag}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('tag')"/>
        </div>


        <div class="mt-4">
            <x-input-label for="about" :value="__('About')" />
            <textarea id="about" name="about" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('about', $program->about)}}</textarea>

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
