<x-modal name="set-applicant-status" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div class="p-5">
        <form method="post" action="{{ route('manage.admission.applicant.validate-application', ['slug' => $applicant->slug]) }}">
            @csrf
            @method('put')

            <h2 class="text-lg font-medium text-gray-900 my-2">
                {{ __('Validate Applicant Status?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Select status to validate applicant.') }}
            </p>

            <div class="mt-5">
                <x-input-label for="applicant_status" :value="__('Application Status')" />
                <select id="applicant_status" name="applicant_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose status</option>
                    @foreach($applicationStatuses as $key => $status)
                        <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Validate') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
