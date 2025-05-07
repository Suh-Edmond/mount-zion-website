<div class="max-w-full">
    <section>
        <form method="post"
              action="{{ route('manage.academics.store') }}"
              class="mt-6 space-y-6">
            @csrf

            <div class="grow my-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                              :value="old('name')" required autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div class="grow my-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                              :value="old('email')" required autocomplete="email"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
            </div>
            <div class="grow my-4">
                <x-input-label for="telephone" :value="__('Telephone')"/>
                <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full"
                              :value="old('telephone')" required autocomplete="telephone"/>
                <x-input-error class="mt-2" :messages="$errors->get('telephone')"/>
            </div>

            <div class="my-4">
                <x-input-label for="about" :value="__('About')"/>
                <textarea id="about" name="about" rows="4"
                          class=" about block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('about')}} </textarea>
                <x-input-error class="mt-2" :messages="$errors->get('about')"/>
            </div>
            <div class="flex flex-row justify-between">
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <x-auth-session-status :status="session('status')"
                                           x-data="{ show: true }"
                                           x-show="show"
                                           x-transition
                                           x-init="setTimeout(() => show = false, 2000)">
                    </x-auth-session-status>
                </div>
            </div>
        </form>
    </section>
</div>

<script></script>
