@section('title', "Academics-Create")
<x-app-layout>
    <x-slot name="header" >
        <div class="flex flex-row">
            <a href="{{route('manage.academics')}}">
                <button id="goBack" class="text-blue-800 text-sm">
                    {{ __('Schools') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                </button>
            </a>
            <a href="{{route('manage.academics.show', ['slug' => $school->slug])}}">
                <button id="goBack" class="text-blue-800 text-sm">
                    {{ $school->name }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                </button>
            </a>
            <a href="#">
                <button id="goBack" class="text-blue-800 text-sm">
                    {{ __('Add Program') }}
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $school->name }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Provide Information to create a program under this school.") }}
                    </p>
                </div>

                <form method="post"
                      action="{{ route('manage.academics.programs.store', ['school_slug' => $school->slug]) }}"
                      class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div class="grow my-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                      :value="old('name')" required autocomplete="name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                    </div>

                    <div class="grow my-4">
                        <x-input-label for="duration" :value="__('Duration (In years)')"/>
                        <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full"
                                      :value="old('duration') ?? 1" required autocomplete="duration"/>
                        <x-input-error class="mt-2" :messages="$errors->get('duration')"/>
                    </div>
                    <div class="grow my-4">
                        <x-input-label for="tag" :value="__('Program Type')"/>
                        <select id="tag" name="tag"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select program type</option>
                            @foreach($tags as $key => $tag)
                                <option value="{{$tag}}" class="{{ old('tag') == $tag ? 'aria-selected': '' }}">{{$tag}}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('tag')"/>
                    </div>

                    <div class="w-full">
                        <x-input-label for="image_path" :value="__('Upload Program Image')" />
                        <input name="image_path"  value="{{old('image_path', $program->image_path ?? '')}}" required class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG (MAX. 1Mb).</p>
                        <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                    </div>

                    <div class="my-4">
                        <x-input-label for="about" :value="__('About')"/>
                        <textarea id="about" name="about" rows="4"
                                  class=" about block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('about')}} </textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('about')"/>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-auth-session-status :status="session('status')"
                                                   x-data="{ show: true }"
                                                   x-show="show"
                                                   x-transition
                                                   x-init="setTimeout(() => show = false, 2000)">
                            </x-auth-session-status>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script></script>
