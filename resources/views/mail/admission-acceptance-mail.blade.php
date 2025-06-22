<x-mail::message>
    ### Dear {{$data['name']}},

    We are pleased to inform you that you have been offered admission to {{$data['school']}} for the
    {{$data['program']}}. Your application impressed our admissions committee, and we believe you will be a valuable addition to our academic community.

    Please checkout our website  {{$data['website']}} 
    for details regarding enrollment, tuition, and important deadlines. We encourage you to confirm your acceptance by
    {{\Carbon\Carbon::parse($data['acceptance_date'])->format('M Y')}}.

    If you have any questions or need further assistance, feel free to contact us at 
    Email: {{$data['school_email']}}
    Tel: {{$data['school_telephone']}}

    Congratulations on this achievement! We look forward to welcoming you to {{$data['school']}}.

    Cheers,

    {{$data['director_name']}}
    {{$data['director_position']}}
    {{$data['school']}}
    {{$data['school_email']}}
    {{ $data['school_telephone'] }}
    {{ $data['website'] }}
</x-mail::message>

