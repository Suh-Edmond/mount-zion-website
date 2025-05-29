<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Program') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('You are about to remove this program and all its information') }}
        </p>
    </header>

    <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-program-deletion')"
    >{{ __('Delete Program') }}</x-danger-button>

    <x-modal name="confirm-program-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manage.academics.programs.delete', ['slug' => $program->slug, 'school_slug' => $program->school->slug]) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this program?') }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900">
                Name : {{ $program->name }}
            </h2>


            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once a is deleted, all information will be deleted.') }}
            </p>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Program') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
