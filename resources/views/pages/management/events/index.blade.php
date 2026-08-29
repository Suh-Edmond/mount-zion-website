@section('title', "Event Management")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Event Management') }}
                </h2>
            </div>

            <a href="{{route('manage.events.create')}}">
                <x-primary-button>{{ __('Add Event') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg py-5 px-5 mt-4 ">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

            @foreach($events as $key => $event)
            <div class="rounded overflow-hidden shadow-lg flex flex-col">
                <a href="{{route('manage.events.show', ['slug'=> $event->slug])}}"></a>
                <div class="relative"><a href="{{route('manage.events.show', ['slug'=> $event->slug])}}">
                        <img class="w-full" src="{{asset($event->getMainImage($event))}}" alt="Blog Image"
                            style="height: 250px!important">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4 mb-auto">
                    <a href="{{route('manage.events.show', ['slug'=> $event->slug])}}"
                        class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$event->title}}</a>
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
                        <span class="ml-1">{{$event->created_at->format('D, d M Y')}}</span>
                    </span>
                </div>
            </div>
            @endforeach
        </div>


        @if(count($events) == 0)
        <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
            Oops! No events found
        </h3>
        @endif
    </div>

    <div class="max-w-7xl mx-auto  pb-3 flex justify-start">
        @if(($events->count() > 0))
        <div class="py-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-5 p-5 flex justify-end">
                 {{$events->links()}}
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
