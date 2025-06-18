<section>
    <header>
        <h2 class="font-medium text-gray-900 py-3" style="font-size: x-large">
            {{ __('Admission Documents') }}
        </h2>
    </header>

    @foreach($applicant->admissionDocuments as $key => $document)
    <div class="my-4 flex space-x-3">
        <label for="name" class="font-semibold text-gray-900" style="font-size: medium">
            {{str_replace('_', ' ', $document->category)}}:
        </label>
        <a class="font-semibold text-blue-800 open_document" href="{{$document->file_path}}" target="_blank"
            style="font-size: medium">{{$document->splitDocumentName($document->file_path)}}</a>

    </div>
    @endforeach


</section>