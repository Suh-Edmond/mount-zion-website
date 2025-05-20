<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.admission.applicants')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Applications') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="#">
                    <button class="text-blue-800 text-sm">
                        {{ __('Add Applicant') }}
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="flex justify-center mt-5">
        <x-auth-session-status :status="session('status')" x-data="{ show: true }"
                               x-show="show"
                               x-init="setTimeout(() => show = false, 3000)" class="pt-1 pl-5">
        </x-auth-session-status>
    </div>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight py-4">
                        {{__('Add Applicant')}}
                    </h2>

                    <h6 class="font-medium text-md text-gray-800 leading-tight py-2">
                        Admission Session : {{date('F-Y', strtotime($admissionSession->start_date))}} - {{date('F-Y', strtotime($admissionSession->end_date))}}
                    </h6>

                    <form method="POST" action="{{route('manage.admission.applicant.store-application', ['admission_year_id' => $admissionSession->id])}}" class="pt-4">
                        @csrf
                        <div class="mt-5">
                            <x-input-label for="fname" :value="__('First Name')" />
                            <x-text-input name="first_name" id="first_name"  class="block mt-1 w-full" type="text" :value="old('first_name')" required autofocus autocomplete="first_name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input name="last_name"  id="last_name" class="block mt-1 w-full" type="text" :value="old('last_name')" required autofocus autocomplete="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-5">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input name="email" class="block mt-1 w-full" type="email"  :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="telephone" :value="__('Telephone')" />
                            <x-text-input name="telephone" class="block mt-1 w-full" type="text" :value="old('telephone')" required autocomplete="telephone" />
                            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input name="address" class="block mt-1 w-full" type="text"  :value="old('address')" required autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="mt-5">
                            <x-input-label for="region" :value="__('Gender')" />
                            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose gender</option>
                                @foreach($genders as $key => $gender)
                                    <option value="{{$gender}} {{old('gender') == $gender ? 'selected' : ''}}">{{$gender}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('region')" class="mt-2" />
                        </div>
                        <div class="mt-5">
                            <x-input-label for="region" :value="__('Region')" />
                            <select id="region" name="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose region</option>
                                @foreach($regions as $key => $value)
                                    <option value="{{$value}} {{old('region') === $value ? 'selected' : ''}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('region')" class="mt-2" />
                        </div>

                        <div class="mt-5 w-full mb-4">
                            <x-input-label for="school_id" :value="__('School')" />
                            <select id="school_id" name="school_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose School</option>
                                @foreach($schools as $key => $school)
                                    <option value="{{$school->id}} {{old('school_id') === $school->id ? 'selected' : ''}}">{{$school->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
                        </div>


                        <div class="mt-5 w-full mb-4">
                            <x-input-label for="program_id" :value="__('Program')" />
                            <select id="program_id" name="program_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose Program</option>
                            </select>
                            <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
                        </div>

                        <div class="d-flex align-items-center single-checkbox mt--20 hidden">
                            <input type="checkbox" name="has_agreed" checked>
                            <label for="exampleCheck1">By submitting this form, you agree to the Mount Zion University Privacy Notice</label>
                        </div>



                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#school_id', function (e){
        e.preventDefault();
        var school_id = ($(this).val());

        // $('#program_id').find('option').not(':first').remove();

        var url = "{{route('main.schools.programs.fetch-all', ':id')}}";

        url = url.replace(':id', school_id);

        $.ajax({
            url: url,
            method: 'GET',
            data: {},

            success: function(data) {
                let option = "";
                let yearslabel = "year(s)"
                for (var i = 0; i < data.data.length; i++){
                    option += '<option value="'+data.data[i].id+'">'+data.data[i].name+ ' - '+ data.data[i].duration+ yearslabel +' </option>';
                }
                $('#program_id').html('');
                $('#program_id').html(option);

            },
            error: function(data){
            },

        });
    })
</script>
