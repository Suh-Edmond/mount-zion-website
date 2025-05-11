<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete School') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once a school is deleted, all of its programs and data will be deleted.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-blog-deletion')"
    >{{ __('Delete School') }}</x-danger-button>

    <x-modal name="confirm-blog-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manage.academics.destroy', ['slug' => $school->slug]) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this school?') }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900">
                Name : {{ $school->name }}
            </h2>


            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once a is deleted, all of its data and programs will be deleted.') }}
            </p>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete School') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
