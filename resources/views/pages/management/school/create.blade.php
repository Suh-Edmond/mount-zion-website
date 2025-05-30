@section('title', "Academics-Create")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Provide School Information to create a school.") }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.school.partials.create-school-form')
            </div>
        </div>
    </div>
</x-app-layout>

<script></script>
