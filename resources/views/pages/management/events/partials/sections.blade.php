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
            </div>
            <div>{!! $section->body !!}</div>
        </div>
        @endforeach

    </section>
</div>
<script>

</script>