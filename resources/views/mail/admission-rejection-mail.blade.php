<x-mail::message>
    ### Dear {{$data['name']}},

    Thank you for your interest in {{$data['school']}} and for submitting your application for the {{$data['program']}}.
    We appreciate the time and effort you put into your application.

    After careful consideration, we regret to inform you that we are unable to offer you admission to the program for
    the {{\Carbon\Carbon::parse($data['start_date'])->format('M Y')}} session. This year, we received a large number of highly qualified applicants, and the selection
    process was incredibly competitive.

    We encourage you to continue pursuing your academic goals and consider reapplying in the future. Thank you once
    again for your interest in {{$data['school']}}, and we wish you all the best in your future endeavors.



    Sincerely,

    {{$data['director_name']}}
    {{$data['director_position']}}
    {{$data['school']}}
    {{$data['school_email']}}
    {{ $data['school_telephone'] }}
    {{ $data['website'] }}
</x-mail::message>