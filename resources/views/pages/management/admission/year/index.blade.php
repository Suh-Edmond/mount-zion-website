@section('title', "Admission Year")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{__('Admission Year Management')}}
            </h2>

            <a href="{{route('manage.admission.years.create')}}">
                <x-primary-button>{{ __('Add Admission Session') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row gap-3">
            <div class="basis-1/4 flex-auto">
                <x-input-label for="status" :value="__('Filter School')" />
                <select id="school_id" name="school_id"
                    class="ajax_select_filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose school</option>
                    @foreach($schools as $key => $school)
                        <option value="{{$school->id}}">
                            {{$school->name}}
                        </option>
                    @endforeach
                    <option value="ALL">ALL</option>
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="status" :value="__('Filter Status')" />
                <select id="status" name="status"
                    class="ajax_select_filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a status</option>
                    <option value="1">Active</option>
                    <option value="0">In Active</option>
                    <option value="ALL">ALL</option>
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="sort" :value="__('Sort')" />
                <select id="sort" name="sort"
                    class="ajax_select_filter bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose sort</option>
                    <option value="DATE_DESC">Newest First</option>
                    <option value="DATE_ASC">Oldest First</option>
                    <option value="NAME">Name</option>
                </select>
            </div>
        </div>
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
                            <tr>
                                <th class="  text-white border text-center px-1 py-2" style="background-color: #16056b">S/N</th>
                                <th class=" text-white border text-center px-4 py-2" style="background-color: #16056b">Name</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Year</th>
                                <th class=" text-white border text-center px-4 py-2" style="background-color: #16056b">Program</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Start Date</th>
                                <th class=" text-white border text-center px-4 py-2" style="background-color: #16056b">End Date</th>
                                <th class="text-white border text-center px-4 py-2" style="background-color: #16056b">Status</th>
                                <th class="text-white border text-center  py-2" style="background-color: #16056b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admissionYears as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400" tabindex="0">
                                <td class="border text-center py-4">{{$key+1}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->name}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->year}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->program->name ?? ''}}</td>
                                <td class="border px-4 py-4 text-center">{{date('d/m/Y',
                                    strtotime($value->start_date))}}</td>
                                <td class="border px-4 py-4 text-center">{{date('d/m/Y',
                                    strtotime($value->end_date))}}</td>
                                @if($value->status)
                                <td class="border px-4 py-4 text-green-700 text-center w-20">Active</td>
                                @else
                                <td class="border px-4 py-4 text-yellow-600 text-center w-20">Inactive</td>
                                @endif
                                <td class="border  py-4 text-center cursor-pointer">
                                    <x-dropdown align="right" width="48" style="z-index: 5">
                                        <x-slot name="trigger">
                                            <span><i class="fa fa-bars"></i></span>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link class="text-blue-600"
                                                href="{{route('manage.admission.years.edit', ['slug' => $value->slug])}}">
                                                <span>
                                                    <i class="fa fa-pencil   text-blue-800 mr-5 cursor-pointer mr-6 ">
                                                    </i>
                                                    {{
                                                    __('Edit') }}
                                                </span>
                                            </x-dropdown-link>
                                            <x-dropdown-link class="text-red-600"
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion{{$value->id}}')">
                                                <span><i class="fa fa-trash text-red-600 cursor-pointer mr-6 "></i>{{
                                                    __('Remove') }}</span>
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                            @include('pages.management.admission.year.delete-year')
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($admissionYears) == 0)
                    <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
                        Oops! No admission years found
                    </h3>
                    @endif
                </div>

                @if(($admissionYears->count() > 0))
                <div class="m-5 p-5 flex justify-between">
                    <p class="font-bold">Total : {{$admissionYears->total()}}</p>
                    <div>
                        {{$admissionYears->links()}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


</x-app-layout>

<script>
    $(document).ready(function() {

        $('#status').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);


            searchParams.set('filter', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

         $('#school_id').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);


            searchParams.set('school_id', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })


        $('#sort').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);


            searchParams.set('sort', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

        $('#goBack').on('click', function (e){
            history.back();
        })



    })
</script>