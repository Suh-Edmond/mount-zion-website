@section('title', "School Details")

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <a href="{{route('manage.academics')}}">
                <button id="goBack" class="text-blue-800 text-sm">
                    {{ __('Schools') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                </button>
            </a>
            <a href="#">
                <button id="goBack" class="text-blue-800 text-sm">
                    {{ __('School Information') }}
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-row gap-3">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg basis-3/4 flex-auto">
                    @include('pages.management.school.partials.image')
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-5">
                @include('pages.management.school.partials.programs')
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.school.partials.delete-school')
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





