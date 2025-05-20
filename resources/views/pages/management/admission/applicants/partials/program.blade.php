<section >
    <header>
        <h2 class="font-medium text-gray-900 py-3" style="font-size: x-large" >
            {{ __('Admission Program Information') }}
        </h2>
    </header>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar "></i><x-input-label for="name" :value="__('School : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->program->school->name}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar "></i><x-input-label for="name" :value="__('Applied Program : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->program->name}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar "></i><x-input-label for="name" :value="__('Duration : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->program->duration}}" style="font-size: medium" />
    </div>
    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar "></i><x-input-label for="name" :value="__('Program Type : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->program->tag}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-user fa-xs "></i><x-input-label for="name" style="font-size:medium" :value="__('Admission Year : ')" />
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->admissionYear->name}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar fa-xs "></i><x-input-label for="name" :value="__('Admission Session : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{date('F-Y', strtotime($applicant->admissionYear->start_date))}} - {{date('F-Y', strtotime($applicant->admissionYear->end_date))}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar fa-xs "></i><x-input-label for="name" :value="__('Application Status : ')"   style="font-size:medium"/>
        @if($applicant->applicant_status === \App\Constant\AdmissionStatus::UNDER_REVIEW)
            <x-input-label for="name" class="font-semibold text-sky-500" value="{{$applicant->applicant_status}}" style="font-size: medium"/>
        @elseif($applicant->applicant_status === \App\Constant\AdmissionStatus::ADMITTED)
            <x-input-label for="name" class="font-semibold text-green-700" value="{{$applicant->applicant_status}}" style="font-size: medium"/>
        @else
            <x-input-label for="name" class="font-semibold text-red-600" value="{{$applicant->applicant_status}}" style="font-size: medium"/>
        @endif
    </div>
</section>
