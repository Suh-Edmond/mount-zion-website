<x-modal name="delete-applicant-modal" :show="$errors->isNotEmpty()" focusable>
    <div class="p-5">
        <form method="post" action="{{ route('manage.admission.applicants.delete', ['slug' => $applicant->slug]) }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this applicant?') }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900 my-2">
                Name : {{ $applicant->user->name }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900 my-2">
                Email : {{ $applicant->user->email }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900 my-2">
                Applied Program : {{ $applicant->program->name }}
            </h2>


            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once a is deleted, all information will be deleted.') }}
            </p>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Applicant') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</x-modal>
