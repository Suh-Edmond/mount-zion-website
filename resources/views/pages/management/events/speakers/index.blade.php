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
                        {{ __('Speakers') }}
                    </button>
                </a>
            </div>

            <a href="{{route('manage.events.speakers.create', ['slug' => $event->slug])}}">
                <x-primary-button>{{ __('Add Event Speaker') }}</x-primary-button>
            </a>
        </div>
    </x-slot>


    <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg py-5 px-5 mt-4 ">
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Event Speakers Management') }}
                </h2>
                <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                </x-auth-session-status>
            </header>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach($speakers as $key => $speaker)
            <div class="rounded overflow-hidden shadow-sm flex flex-col my-3">
                <div class="relative">
                    <a href="#">
                        <img class="w-25 rounded" src="{{asset($speaker->picture)}}" alt="Blog Image" height="50px">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-white-900 opacity-25">
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4 mb-auto text-center">
                    <div class="flex justify-start">
                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'edit-speaker-picture{{$speaker->id}}')"
                            class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-1">
                            <i class="fa fa-pencil text-blue-600 cursor-pointer mr-6 "></i></a>

                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'remove-speaker{{$speaker->id}}')"
                            class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-1">
                            <i class="fa fa-trash text-red-600 cursor-pointer mr-6 "></i></a>
                    </div>
                    <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-speaker{{$speaker->id}}')"
                        class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$speaker->name}}</a><br>
                    <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-speaker{{$speaker->id}}')"
                        class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$speaker->title}}</a>
                </div>
            </div>
            @include('pages.management.events.speakers.partials.delete-speaker')
            @include('pages.management.events.speakers.partials.edit-speaker-picture')
            @include('pages.management.events.speakers.partials.edit-speaker')
            @endforeach
        </div>
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