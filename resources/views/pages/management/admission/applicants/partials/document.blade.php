<section >
    <header>
        <h2 class="font-medium text-gray-900 py-3" style="font-size: x-large" >
            {{ __('Admission Documents') }}
        </h2>
    </header>

   @foreach($applicant->admissionDocuments as $key => $document)
        <div class="my-4 flex space-x-3">
            <x-input-label for="name" class="font-semibold text-gray-900" value="{{$document->category}} : " style="font-size: medium" />
            <x-input-label><a class="font-semibold text-blue-800" href="{{$document->file_path}}" style="font-size: medium">{{$document->file_path}}</a></x-input-label>
        </div>
    @endforeach
</section>
