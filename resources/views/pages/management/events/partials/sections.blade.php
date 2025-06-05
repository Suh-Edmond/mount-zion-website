<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Event Sections') }}
                </h2>
                <x-auth-session-status :status="session('status')" x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                </x-auth-session-status>
            </header>

            <div class="flex justify-end">
                <a href="{{route('manage.events.sections.list', ['slug' => $event->slug])}}">
                    <x-secondary-button>{{ __('View more') }}</x-secondary-button>
                </a>
            </div>

        </div>

        @foreach($event->eventSections->take(2) as $section)
        <div class="my-5 border-2 p-3 rounded-md">
            <div class="flex justify-between">
                <x-input-label for="period" value="{{$section->title}}" />
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link x-data="edit_outline{{$section->id ?? ''}}"
                            x-on:click.prevent="$dispatch('open-modal', 'edit_outline{{$section->id ?? ''}}')"
                            class="cursor-pointer">
                            <span><i class="fa fa-pencil text-blue-800 cursor-pointer  mr-5"></i>{{ __('Edit') }}</span>
                        </x-dropdown-link>

                        <x-dropdown-link x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'delete_section{{$section->id ?? ''}}')"
                            class="cursor-pointer">
                            <span><i class="fa fa-trash text-red-600 cursor-pointer mr-5 "></i>{{ __('Delete') }}</span>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <div>{!! $section->body !!}</div>
        </div>
        @include('pages.management.events.sections.partials.delete-section')
        @include('pages.management.events.sections.partials.add-section-form')
        @endforeach

    </section>
</div>
<script>

</script>