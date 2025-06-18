@section('title', "Create Admission Year")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.admission.years')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Admission Session Management') }}<span><i
                                class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>

                <a href="#">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Add Session') }}
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="flex justify-center mt-5">
        <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
            x-init="setTimeout(() => show = false, 3000)" class="pt-1 pl-5">
        </x-auth-session-status>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('manage.admission.years.store', ['slug' => '']) }}">
                    @csrf

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Create Admission Session') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Provide Information below to add an admission session.") }}
                    </p>


                    <div class="my-5">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                            required autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="my-5">
                        <x-input-label for="year" :value="__('Year')" />
                        <input type="number" id="year" value="{{old('year')}}" required name="year" min="2020"
                            max="2050"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                        <x-input-error class="mt-2" :messages="$errors->slotCreation->get('year')" />
                    </div>

                    <div class="my-5">
                        <x-input-label for="year" :value="__('Start Date')" />
                        <input type="date" id="start_date" value="{{old('start_date')}}" required name="start_date"
                            min="2020" max="2050"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                        <x-input-error class="mt-2" :messages="$errors->slotCreation->get('start_date')" />
                    </div>

                    <div class="my-5">
                        <x-input-label for="end_date" :value="__('End Date')" />
                        <input type="date" id="end_date" value="{{old('end_date')}}" required name="end_date" min="2020"
                            max="2050"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">

                        <x-input-error class="mt-2" :messages="$errors->slotCreation->get('end_date')" />
                    </div>

                    <div class="my-5">
                        <x-input-label for="school_id" :value="__('School')" />
                        <select id="school_id" name="school_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select school</option>
                            @foreach($schools as $key => $school)
                            <option value="{{$school->id}}"
                                class="{{ old('school_id') == $school->id ? 'aria-selected': '' }}">
                                {{$school->name}}
                            </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('school_id')" />
                    </div>

                    <div class="my-5">
                        <x-input-label for="program_id" :value="__('Program')" />
                        <select id="program_id" name="program_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select program</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('program_id')" />
                    </div>


                    <div class="my-6 flex justify-between">
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>

                        <a href="{{route('manage.admission.years')}}">
                            <x-secondary-button>
                                {{ __('Back') }}
                            </x-secondary-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('change', '#school_id', function (e){
        e.preventDefault();
        var school_id = ($(this).val());

        $('#program_id').find('option').not(':first').remove();

        var url = "{{route('main.schools.programs.fetch-all', ':id')}}";

        url = url.replace(':id', school_id);

        $.ajax({
            url: url,
            method: 'GET',
            data: {},

            success: function(data) {
                let option = "<option value=''>Choose program</option>";
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
    });
</script>