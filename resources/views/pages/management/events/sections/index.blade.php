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
        @foreach($sections as $key => $section)
        <div class="my-5 border-2 p-3 rounded-md">
            <div class="flex justify-between">
                <x-input-label for="period" value="{{$section->title}}" />
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link x-data="edit_section{{$section->id ?? ''}}"
                            x-on:click.prevent="$dispatch('open-modal', 'edit_section{{$section->id ?? ''}}')"
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
            <div>{!! $section->body !!}</div>
        </div>
        @include('pages.management.events.sections.partials.delete-section')
        @endforeach
    </div>

    @include('pages.management.events.sections.partials.add-section-form')
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