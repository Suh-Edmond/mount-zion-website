<section>
    <div>
<<<<<<< HEAD
        <div class="">
            <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer mb-4">
                <img src="{{asset($program->image_path)}}" alt="Program Image"
                    style="width: 250px !important; height:250px !important;">
=======
        <div class="flex justify-between items-start">
            <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer mb-4">
                <img class="h-[320px]" src="{{asset($program->image_path)}}" alt="Program Image">
>>>>>>> 1ed509cc4fb274cc6fc19a057d7db4352efe833c
            </div>

            <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'upload_image_modal')">
                <i class="fa fa-pencil text-blue-800 cursor-pointer"></i>
            </x-secondary-button>
        </div>
    </div>

    @include('pages.management.program.partials.edit-program-image-form')
    @include('pages.management.program.partials.upload-image-modal')
</section>