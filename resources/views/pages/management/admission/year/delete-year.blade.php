<section class="space-y-6 space-x-3 p-5">
    <x-modal name="confirm-deletion{{$value->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manage.admission.years.remove', ['slug' => $value->slug]) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this admission year?') }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900">
                Name : {{ $value->name }}
            </h2>
            <h2 class="text-lg font-medium text-gray-900">
                Year : {{ $value->year }}
            </h2>


            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once a is deleted, all information will be deleted.') }}
            </p>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Year') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

