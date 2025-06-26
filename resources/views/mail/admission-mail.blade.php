<x-mail::message>
    ### Dear {{$data['name']}},

    Thank you for your application to the **{{$data['program_title']}}** program at **{{$data['school']}}**. We have received
    all the necessary documents and your application is now under review by our admissions committee.

    We understand that you are eager to hear about the outcome of your application. We will notify you of our decision by the {{\Carbon\Carbon::parse($data['date'])->format('j F Y')}}.

    In the meantime, if you have any questions, please don't hesitate to contact us at {{$data['school_email']}} or {{$data['school_telephone']}}.

    We appreciate your interest in {{$data['school']}} and wish you the best during the application process.


    
    Sincerely,


    {{$data['director_name']}}
    {{$data['director_position']}}
    {{$data['school']}}
    {{$data['school_email']}}
    {{ $data['school_telephone'] }}
</x-mail::message>