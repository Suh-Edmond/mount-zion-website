<section>
    <div>
        <div class="flex justify-between">
            <h2 class="font-bold text-lg">Information</h2>

            <x-primary-button x-data=""
                              x-on:click.prevent="$dispatch('open-modal', 'edit-program')">
                Edit <span class="space-x-3"></span>
            </x-primary-button>
        </div><br/>

        <div>
            <div class="space-y-3">
                <div class="flex my-5">
                    <h2 class="font-bold">
                        <x-input-label for="files" :value="__('Name')"/> {{$program->name}}</h2>

                </div>
                <div class="flex my-5">
                    <h2 class="font-bold">
                        <x-input-label for="files" :value="__('Duration')"/>{{$program->duration}}</h2>
                </div>
                <div class="flex my-5">
                    <h2 class="font-bold">
                        <x-input-label for="telephone" :value="__('Program Type')"/>{{$program->tag}}</h2>
                </div>
                <div class="flex my-5">
                    <h2 class="font-bold">
                        <x-input-label for="about" :value="__('About')"/>
                    </h2>
                </div>
                <p class="font-bold">
                    {{ $program->stripDescriptionTags($program->about) }}
                </p>
            </div>
        </div>
    </div>


    @include('pages.management.program.partials.edit-program-info')
</section>
