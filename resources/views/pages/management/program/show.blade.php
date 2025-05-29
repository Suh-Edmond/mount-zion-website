@section('title', "Program Detail")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.academics')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Schools') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="{{route('manage.academics.show', ['slug' => $program->school->slug])}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ $program->school->name }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="{{route('manage.academics.programs.list', ['slug' => $program->school->slug])}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Programs') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="#">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Program Information') }}
                    </button>
                </a>
            </div>

            <a  href="{{route('manage.academics.programs.create', ['slug' => $program->school->slug])}}">
                <x-primary-button
                >{{ __('Add Program') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-row gap-3">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg basis-3/4 flex-auto">
                    @include('pages.management.program.partials.image')
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-5">
                @include('pages.management.program.partials.information')
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.program.partials.delete')
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $('#goBack').on('click', function (e){
        history.back();
    })

    $(function () {
        $(document).ready(function () {

            $('#imageUploadForm').ajaxForm({
                beforeSend: function () {
                    var percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    var percentage = percentComplete;
                    $('.progress .progress-bar').css("width", percentage+'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })

                },
                complete: function (xhr) {
                    $modal.modal('hide');
                    window.location.reload();
                }
            });
        });
    });
</script>





