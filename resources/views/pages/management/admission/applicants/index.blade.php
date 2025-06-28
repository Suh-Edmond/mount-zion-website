@section('title', "Admission Applicants")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{__('Applicant Management')}}
            </h2>
            {{-- <x-primary-button><a href="{{route('manage.admission.applicant.create-application')}}">{{ __('Add
                    Applicant') }} </a></x-primary-button> --}}
        </div>
    </x-slot>

    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form accept="{{route('manage.admission.applicants')}}" method="GET">
            <div class="flex flex-row gap-3">

                <div class="basis-1/4 flex-auto">
                    <x-input-label for="category" :value="__('School')" />
                    <select id="school" name="school_id" 
                        class="ajax_select_filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a school</option>
                        @foreach($schools as $school)
                        <option value="{{$school->id}}">{{$school->name}}</option>
                        @endforeach
                        <option value="ALL">ALL</option>
                    </select>
                </div>
                <div class="basis-1/4 flex-auto">
                    <x-input-label for="program_id" :value="__('Program')" />
                    <select id="program_id" name="program_id"  
                        class="ajax_select_filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose a program</option>
                    </select>
                </div>
                <div class="basis-1/4 flex-auto">
                    <x-input-label for="session_id" :value="__('Session')" />
                    <select id="session_id" name="session_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose a session</option>
                    </select>
                </div>
                <div class="basis-1/4 flex-auto">
                    <x-input-label for="sort" :value="__('Sort')" />
                    <select id="sort" name="sort"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose sort</option>
                        <option value="DATE_DESC">Newest First</option>
                        <option value="DATE_ASC">Oldest First</option>
                        <option value="NAME">Name</option>
                    </select>
                </div>
                <div class="basis-1/4 flex-auto">
                    <x-primary-button class="mt-5">
                        {{ __('Filter') }}
                    </x-primary-button>
                </div>

            </div>
        </form>
    </div>
    <div class="flex justify-center mt-5">
        <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
            x-init="setTimeout(() => show = false, 3000)" class="pt-1 pl-5">
        </x-auth-session-status>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-visible sm:rounded-lg">
                <div>
                    <table class=" bg-white border-collapse w-full">
                        <thead>
                            <tr class="p-4">
                                <th class="text-white border text-center px-1 py-2" style="background-color: #16056b">S/N</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Name</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Program</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Status</th>
                                <th class="text-white border text-center  py-2" style="background-color: #16056b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400" tabindex="0">
                                <td class="border text-center py-4">{{$key+1}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->user->name}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->program->name}}</td>
                                @if($value->applicant_status === \App\Constant\AdmissionStatus::UNDER_REVIEW)
                                <td class="border px-4 py-4 text-center text-sky-500">
                                    {{$value->trimApplicantStatus($value->applicant_status)}}</td>
                                @elseif($value->applicant_status === \App\Constant\AdmissionStatus::ADMITTED)
                                <td class="border px-4 py-4 text-center text-green-700">{{$value->applicant_status}}
                                </td>
                                @else
                                <td class="border px-4 py-4 text-center text-red-800">{{$value->applicant_status}}</td>
                                @endif
                                <td class="border  py-4 text-center cursor-pointer">
                                    <x-dropdown align="right" width="48" style="z-index: 5">
                                        <x-slot name="trigger">
                                            <span><i class="fa fa-bars"></i></span>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link
                                                href="{{route('manage.admission.applicants.show', ['slug' => $value->slug])}}">
                                                <span><i class="fa fa-user   cursor-pointer mr-5 "></i>{{ __('Profile')
                                                    }}</span>
                                            </x-dropdown-link>
                                            <x-dropdown-link class="text-red-600"
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-applicant-deletion{{$value->id}}')">
                                                <span><i class="fa fa-trash text-red-600 cursor-pointer mr-6 "></i>{{
                                                    __('Remove') }}</span>
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                            @include('pages.management.admission.applicants.partials.delete-applicant')
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($applicants) == 0)
                    <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
                        Oops! No applicants found
                    </h3>
                    @endif
                </div>

                @if(($applicants->count() > 0))
                <div class="m-5 p-5 flex justify-between">
                    <p class="font-bold">Total : {{$applicants->total()}}</p>
                    
                    <div>
                        {{$applicants->links()}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>

<script src="{{ asset('assets/js/application-filter.js') }}"></script>