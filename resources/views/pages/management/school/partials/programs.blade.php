<div class="max-w-7xl mx-auto py-5 px-5">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Programs') }}
                </h2>
            </header>

            <div>

                <a href="{{route('manage.academics.programs.create', ['slug' => $school->slug])}}">
                    <x-primary-button>{{ __('Add Program') }}</x-primary-button>
                </a>
                <a href="{{route('manage.academics.programs.list', ['slug' => $school->slug])}}">
                    <x-secondary-button>{{ __('View more') }}</x-secondary-button>
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-4">
            @foreach($programs as $key => $program)
                <div class="rounded overflow-hidden shadow-lg flex flex-col my-3">
                    <a href="{{route('manage.academics.programs.show', ['slug'=> $program->slug])}}"></a>
                    <div class="relative"><a href="{{route('manage.academics.programs.show', ['slug'=> $program->slug])}}">
                            <img class="w-full"
                                 src="{{asset('/images/dept_image.png')}}"
                                 alt="Blog Image" height="50px">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="{{route('manage.academics.programs.show', ['slug'=> $program->slug])}}"
                           class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out mb-2">{{$program->name}}</a>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                         y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                         xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1">{{$program->created_at->format('D, d M Y')}}</span>
                </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
