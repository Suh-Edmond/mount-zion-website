<section >
    <header>
        <h2 class="font-medium text-gray-900 py-3" style="font-size: x-large" >
            {{ __('Profile Information') }}
        </h2>
    </header>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-user cursor-pointer fa-xs "></i><x-input-label for="name" style="font-size:medium" :value="__('Name : ')" />
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->name}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-envelope cursor-pointer fa-xs "></i><x-input-label for="name" :value="__('Email : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->email}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-phone cursor-pointer "></i><x-input-label for="name" :value="__('Telephone : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->telephone}}" style="font-size: medium" />
    </div>

    <div class="my-4 flex space-x-3">
        <span><i class="fa fa-home cursor-pointer  "></i></span><x-input-label for="name" :value="__('Address : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold t text-gray-900" value="{{$applicant->user->address}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        @if($applicant->user->gender == \App\Constant\Gender::FEMALE)
            <i class="fa fa-female cursor-pointer "></i>
        @else
            <i class="fa fa-male cursor-pointer "></i>
        @endif
        <x-input-label for="name" :value="__('Gender : ')"  style="font-size:medium" />
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->gender}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-home cursor-pointer "></i><x-input-label for="name" :value="__('Region : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->region}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-calendar cursor-pointer "></i><x-input-label for="name" :value="__('Date of brith : ')"   style="font-size:medium"/>
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->dob}}" style="font-size: medium"/>
    </div>

    <div class="my-4 flex space-x-3">
        <i class="fa fa-home cursor-pointer  "></i><x-input-label for="name" :value="__('Place of birth : ')"  style="font-size:medium" />
        <x-input-label for="name" class="font-semibold text-gray-900" value="{{$applicant->user->pob}}" style="font-size: medium" />
    </div>
</section>
