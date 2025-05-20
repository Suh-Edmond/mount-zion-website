<x-modal name="add-applicant" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="">
    <div class="p-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
            {{__('Add Applicant')}}
        </h2>

        <h6 class="font-medium text-md text-gray-800 leading-tight py-2">
            Admission Session : {{date('F-Y', strtotime($admissionSession->start_date))}} - {{date('F-Y', strtotime($admissionSession->end_date))}}
        </h6>

        <form method="POST" action="{{route('main.admission.applicant.store', ['admission_year_id' => $admissionSession->id])}}" class="pt-4">
            @csrf

            <!-- Name -->
            <div class="mt-5">
                <x-input-label for="fname" :value="__('First Name')" />
                <x-text-input id="fname" class="block mt-1 w-full" type="text" name="name" :value="old('fname')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
            </div>
            <div class="mt-5">
                <x-input-label for="lname" :value="__('Last Name')" />
                <x-text-input id="lname" class="block mt-1 w-full" type="text" name="name" :value="old('lname')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('lname')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-5">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-5">
                <x-input-label for="telephone" :value="__('Telephone')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autocomplete="telephone" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
            <div class="mt-5">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="region" :value="__('Gender')" />
                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose gender</option>
                    @foreach($genders as $key => $gender)
                        <option value="{{$gender}}">{{$gender}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('region')" class="mt-2" />
            </div>
            <div class="mt-5">
                <x-input-label for="region" :value="__('Region')" />
                <select id="region" name="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose region</option>
                    @foreach($regions as $key => $value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('region')" class="mt-2" />
            </div>

            <div class="mt-5 w-full mb-4">
                <x-input-label for="program_id" :value="__('Program')" />
                <select id="program_id" name="program_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose Program</option>
                    @foreach($programs as $key => $program)
                        <option value="{{$program->id}}">{{$program->name}} - {{$program->duration}} year(s)</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-4">
                    {{ __('Add Applicant') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
