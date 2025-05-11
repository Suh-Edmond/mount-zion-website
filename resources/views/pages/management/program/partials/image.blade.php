<section>
    <div>
        <div class="flex justify-between">
            <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer mb-4">
                <img src="{{asset('/images/dept_image.png')}}" alt="Program Image">
            </div>

            <span><i class="fa fa-pencil text-blue-800 cursor-pointer"></i></span>
        </div>
    </div>

    @include('pages.management.program.partials.edit-program-image-form')
</section>
