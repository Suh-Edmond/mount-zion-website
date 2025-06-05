@section('title', "Event Management")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.academics')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Event Management') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="{{route('manage.events.show', ['slug' => $event->slug])}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ $event->title }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="#">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Sections') }}
                    </button>
                </a>
            </div>

            <a href="#" x-data="add-event-section" x-on:click.prevent="$dispatch('open-modal', 'add-event-section')">
                <x-primary-button>{{ __('Add Event Section') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg py-5 px-5 mt-4 ">
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Event Sections Management') }}
                </h2>
                <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                </x-auth-session-status>
            </header>
        </div>
        @foreach($sections as $key => $section)
        <div class="my-5 border-2 p-3 rounded-md">
            <div class="flex justify-between">
                <label for="period" class="font-bold mb-2">Title: {{$section->title}}</label>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link x-data="edit-event-section"
                            x-on:click.prevent="$dispatch('open-modal', 'edit_event_section{{$section->id ?? ''}}')"
                            class="cursor-pointer">
                            <span><i class="fa fa-pencil text-blue-800 cursor-pointer  mr-5"></i>{{ __('Edit')
                                }}</span>
                        </x-dropdown-link>

                        <x-dropdown-link x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'delete_section{{$section->id ?? ''}}')"
                            class="cursor-pointer">
                            <span><i class="fa fa-trash text-red-600 cursor-pointer mr-5 "></i>{{ __('Delete')
                                }}</span>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="font-bold">Body:</div>
            <div>{!! $section->body !!}</div>
        </div>
        @include('pages.management.events.sections.partials.edit-section-form')
        @include('pages.management.events.sections.partials.delete-section')
        @endforeach

        @include('pages.management.events.sections.partials.add-section-form')

        @if(count($sections) == 0)
        <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
            Oops! No event sections found
        </h3>
        @endif


        @if(($sections->count() > 0) && $sections->count() > 10)
        <div class="m-5 p-5 flex justify-between">
            <p class="font-bold">Total : {{$sections->total()}}</p>
            <nav aria-label="Page navigation example py-5">
                <ul class="flex items-center -space-x-px h-10 text-base">
                    <li class="{{$sections->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                        <a href="{{route('manage.admission.applicants', ['page' =>$sections->currentPage() - 1])}}"
                            class="{{$sections->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                            <span class="sr-only">Previous</span>
                            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>
                    @for($i = 1; $i <= $sections->lastPage(); $i++)
                        <li>
                            <a href="{{route('manage.admission.applicants', ['page' => $i])}}"
                                class="{{$sections->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                {{$i}}
                            </a>
                        </li>
                        @endfor

                        <li
                            class="{{$sections->currentPage() == $sections->lastPage() ? 'page-item disabled': 'page-item'}}">
                            <a href="{{route('manage.admission.applicants', ['page' =>$sections->currentPage() + 1])}}"
                                class="{{$sections->currentPage() == $sections->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                <span class="sr-only">Next</span>
                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </li>
                </ul>
            </nav>
        </div>
        @endif
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {

        // return urlObj.toString();

        $('#status').on('change', function (e){
            let url = new URL(location.href);

            let searchParams = new URLSearchParams(url.search);

            searchParams.delete('search_title');

            searchParams.set('filter', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

        $('#tag').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);
            let parsedTag = JSON.parse(e.target.value);

            searchParams.set('tag', parsedTag.name)
            searchParams.set('tag_id', parsedTag.id)
            searchParams.delete('search_title');

            url.search = searchParams.toString();

            location.href = url

        })

        $('#category').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);
            searchParams.delete('search_title');

            searchParams.set('category_slug', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

        $('#sort').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);
            searchParams.delete('search_title');

            searchParams.set('sort', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

    })
</script>