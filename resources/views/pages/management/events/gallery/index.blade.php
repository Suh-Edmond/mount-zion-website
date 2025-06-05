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
                        {{ __('Gallery') }}
                    </button>
                </a>
            </div>

            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_image_modal')">
                {{ __('Add Picture') }}</x-primary-button>
        </div>
    </x-slot>


    <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg py-5 px-5 mt-4 ">
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Event Gallery Management') }}
                </h2>
                <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                </x-auth-session-status>
            </header>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mt-4">
            @foreach($gallery as $key => $value)
            <div class="rounded overflow-hidden shadow-lg flex flex-col my-3">
                <div class="relative">
                    <a href="#">
                        <img class="w-25 rounded" src="{{asset($value->file_path)}}" alt="Blog Image" height="60px">
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-white-900 opacity-25">
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4 mb-auto flex justify-between">
                    <div class="flex justify-start">
                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'edit_image_modal{{$value->id}}')"
                            class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-1">
                            <i class="fa fa-pencil text-blue-600 cursor-pointer mr-6 "></i></a>

                        <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'remove_image{{$value->id}}')"
                            class="font-medium text-lg inline-block text-center hover:text-indigo-600 transition duration-500 ease-in-out mb-1">
                            <i class="fa fa-trash text-red-600 cursor-pointer mr-6 "></i></a>
                    </div>
                    @if($value->is_main)
                    <div>
                        <div for="picture" class="text-xs text-white p-1 font-bold bg-red-500 ">
                            Main
                            Picture</div>
                    </div>
                    @endif
                </div>
            </div>
            @include('pages.management.events.gallery.partials.delete-image-modal')
            @include('pages.management.events.gallery.partials.edit-image-form')
            @endforeach
        </div>
    </div>

    @include('pages.management.events.gallery.partials.add-image-form')
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