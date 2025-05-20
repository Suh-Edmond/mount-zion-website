<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-around">
                <a href="{{route('manage.admission.applicants')}}">
                    <button id="goBack" class="text-blue-800 text-sm">
                        {{ __('Applications') }}<span><i class="fa fa-chevron-right px-5 fa-sm"></i></span>
                    </button>
                </a>
                <a href="#">
                    <button class="text-blue-800 text-sm">
                        {{ __('Applicant Profile') }}
                    </button>
                </a>
            </div>
            @if($applicant->applicant_status === \App\Constant\AdmissionStatus::UNDER_REVIEW)
                <x-primary-button x-data=""
                                  x-on:click.prevent="$dispatch('open-modal', 'set-applicant-status')"
                >{{ __('Validate Applicant') }}</x-primary-button>
            @endif
        </div>
    </x-slot>

    <div class="flex justify-center mt-5">
        <x-auth-session-status :status="session('status')" x-data="{ show: true }"
                               x-show="show"
                               x-init="setTimeout(() => show = false, 3000)" class="pt-1 pl-5">
        </x-auth-session-status>
    </div>

    @include('pages.management.admission.applicants.partials.validate-applicant')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @include('pages.management.admission.applicants.partials.profile')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @include('pages.management.admission.applicants.partials.program')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl">
                    @include('pages.management.admission.applicants.partials.document')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
