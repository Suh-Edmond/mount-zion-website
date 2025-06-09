<section>
    <div>
        <div class="flex justify-between">
            <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer mb-4">
                <img src="{{asset($program->image_path)}}" alt="Program Image">
            </div>

            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'upload_image_modal')">
                <i class="fa fa-pencil text-blue-800 cursor-pointer"></i></x-primary-button>
        </div>
    </div>

    @include('pages.management.program.partials.edit-program-image-form')
    @include('pages.management.program.partials.upload-image-modal')
</section>