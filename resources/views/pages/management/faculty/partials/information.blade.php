<section>
    <div>
        <div class="flex justify-between">
            <h2 class="font-bold">About</h2>

            <x-primary-button x-data=""
                              x-on:click.prevent="$dispatch('open-modal', 'edit-faculty-about')">
                Edit <span class="space-x-3"><i class="fa fa-pencil text-blue-800 cursor-pointer"></i></span>
            </x-primary-button>
        </div><br/>

        <p>
            {{ ($faculty->stripDescriptionTags($faculty->about))}}
        </p>
    </div>


    @include('pages.management.faculty.partials.edit-faculty-about')
</section>
