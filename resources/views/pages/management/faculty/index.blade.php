@section('title', "Acadecmics")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Academic Management') }}
            </h2>

            <a href="{{route('manage.academics.create')}}">
                <x-primary-button>{{ __('Create Faculty') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap w-full">
            <form method="get" action="{{ route('manage.academics') }}" class="w-full">
                <div class="md:flex md:items-center">
                    <x-text-input id="search_title" name="search_title" type="text" class="mt-1 mr-2 block w-full"
                        placeholder="Search blog by name..." required autocomplete="search" />
                    <x-primary-button>{{ __('Search') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-12">
        <h6 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">
            {{ __('Showing') }} {{count($faculties->items())}} / {{ $faculties->total() }} {{__('Faculties')}}
        </h6>
    </div>

    <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg py-5 px-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

            @foreach($faculties as $key => $faculty)
            <div class="rounded overflow-hidden shadow-lg flex flex-col">
                <a href="{{route('manage.academics.show', ['slug'=> $faculty->slug])}}"></a>
                <div class="relative"><a href="{{route('manage.academics.show', ['slug'=> $faculty->slug])}}">
                        <img class="w-full" src="{{asset('/images/dept_image.png')}}" alt="Blog Image" height="50px">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4 mb-auto">
                    <a href="{{route('manage.academics.show', ['slug'=> $faculty->slug])}}"
                        class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$faculty->name}}</a>
                </div>
                <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                    <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <span class="ml-1">{{$faculty->created_at->format('D, d M Y')}}</span>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto  py-3 flex justify-end">
        @if(($faculties->count() > 0))
        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-5 p-5 flex justify-end">
                <nav aria-label="Page navigation example">
                    <ul class="flex items-center -space-x-px h-10 text-base">
                        <li class="{{$faculties->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                            <a href="{{route('manage.academics', ['page' =>$faculties->currentPage() - 1])}}"
                                class="{{$faculties->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                <span class="sr-only">Previous</span>
                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </a>
                        </li>
                        @for($i = 1; $i <= $faculties->lastPage(); $i++)
                            <li>
                                <a href="{{route('manage.academics', ['page' => $i])}}"
                                    class="{{$faculties->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                    {{$i}}
                                </a>
                            </li>
                            @endfor

                            <li
                                class="{{$faculties->currentPage() == $faculties->lastPage() ? 'page-item disabled': 'page-item'}}">
                                <a href="{{route('manage.academics', ['page' =>$faculties->currentPage() + 1])}}"
                                    class="{{$faculties->currentPage() == $faculties->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
:'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
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