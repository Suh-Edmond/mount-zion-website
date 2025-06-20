<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-row gap-1 mx-auto sm:px-6 lg:px-8 flex-wrap">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 w-full">
                <div
                    class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg py--5 cursor-pointer">
                    <a href="{{route('manage.academics')}}">
                        <div class="flex justify-center pt-5 mt-3"><img src="{{asset('images/programs.png')}}"
                                height="80px" width="80px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Schools
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{$schoolCount}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer">
                    <a href="{{route('manage-academics-program')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('images/graduation-hat.png')}}"
                                height="100px" width="100px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Programs
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{$programCount}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer">
                    <a href="{{route('manage.events')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('images/events.png')}}"
                                height="120px" width="120px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Events
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{ $eventCount }}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer">
                    <a href="{{route('manage.admission.years')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('images/admission_session.png')}}"
                                height="90px" width="90px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Admission Sessions
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{ $admissionSessionCount }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>