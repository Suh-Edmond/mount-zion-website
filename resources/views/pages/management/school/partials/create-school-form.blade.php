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
            <div class="grow my-4">
                <x-input-label for="address" :value="__('Address')"/>
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                              :value="old('address')" required autocomplete="address"/>
                <x-input-error class="mt-2" :messages="$errors->get('address')"/>
            </div>
            <div class="grow my-4">
                <x-input-label for="region" :value="__('Region')"/>

                <select id="region" name="region"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose region</option>
                    @foreach($regions as $key => $region)
                        <option value="{{$region}}" class="{{ old('region') == $region ? 'aria-selected': '' }}">{{$region}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('region')"/>
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
